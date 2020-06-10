<?php


namespace App\Security;


use App\Entity\Command;
use App\Entity\CommandItem;
use App\Entity\Prestation;
use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
use App\Entity\User;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\AuthenticationException;
use Stripe\Exception\InvalidRequestException;
use Stripe\Exception\RateLimitException;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\EphemeralKey;
use Stripe\PaymentIntent;
use Ramsey\Uuid\Uuid;

class StripeService extends Stripe
{

    /**
     * @var String
     */
    private $key;
    /**
     * @var String
     */
    private $domain;

    public $error;

    public function __construct(String $secret, String $domain)
    {
        $this->domain = $domain;
        self::setApiKey($secret);


    }

    /**
     * @param ShoppingCart $cart
     * @return Session|null
     */
    public function createCartSession(ShoppingCart $cart) {

        $lineItems = [];
        /** @var Session|null  $session */
        $session = null;
        foreach ($cart->getItems() as $item) {
            if (!$item instanceof ShoppingCartItem) continue;
            if ($item->getCheckOutSessionID())continue;


            /**  @var Prestation $prestation */
            $prestation = $item->getPrestation();

            $lineItems[] = [
                'name' => $prestation->getName(),
                'description' => 'Comfortable cotton t-shirt',
                'amount' => !$item->getTotalAmount() ? 1500 : $item->getTotalAmount() * 1000,
                'currency' => 'usd',
                'quantity' => !$item->getQuantity() ? 5 : $item->getQuantity(),
            ];
        }

        try {


            $session = Session::create([
                    'success_url' => 'https://example.com/success',
                    'cancel_url' => 'https://example.com/cancel',
                    'payment_method_types' => ['card'],
                    'line_items' => $lineItems
                ]);
            foreach ($cart->getItems() as $item) {
                if (!$item instanceof ShoppingCartItem) continue;
                $item->setCheckOutSessionID($session["id"]);
            }
            return $session;

        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {

            $this->error = "Invalid parameters were supplied to Stripe's API: ". $e->getMessage();
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
    }
    /**
     * @param Command $command
     * @return Session|null
     */
    public function createSession(Command $command)
    {
        try {
            if (!$command->getCheckOutSessionID()) {

                var_dump($this->getLinesItems($command));
                return Session::create([
                    'success_url' => 'https://example.com/success',
                    'cancel_url' => 'https://example.com/cancel',
                    'payment_method_types' => ['card'],
                    'line_items' => $this->getLinesItems($command)
                ]);
            } else {
                return Session::retrieve($command->getCheckOutSessionID());
            }
        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {
            $this->error = "Invalid parameters were supplied to Stripe's API";
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
       // var_dump($this->error);
        return null;
    }

    /**
     * @param User $user
     * @return String|null
     */
    public function createCustomer(User $user)
    {
        try {
            $customer = Customer::create([
                'description' => 'testing',
                'email' => $user->getEmail(),
                'phone' => "0678787878",
                'name' => $user->getUsername()
            ]);
           return $customer->id;
        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {
            $this->error = "Invalid parameters were supplied to Stripe's API";
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
        return null;

    }

    public function createEphemeralKey(String $customerId, String $version)
    {
        try {
            return EphemeralKey::create(
                ["customer" => $customerId],
                ["stripe_version" => $version]
            );
        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {
            $this->error = "Invalid parameters were supplied to Stripe's API";
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
        return null;
    }

    /**
     * @param Command $command
     * @return PaymentIntent|null
     */
    public function updatePaymentIntent(Command $command)
    {
        try {
           return PaymentIntent::update(
                $command->getSecondaryId(),
               [
                   'amount' => $command->getTotalAmount() * 100,
                   //'metadata' => ['order_id' => '6735']
               ]
            );
        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {
            $this->error = "Invalid parameters were supplied to Stripe's API". $e->getMessage();
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
        return null;

    }
    /**
     * @param Command $command
     * @return PaymentIntent|null
     */
    public function createPaymentIntent(Command $command)
    {
//        $charge = \Stripe\Charge::create([
//            "amount" => 2000,
//            "currency" => "usd",
//            "source" => "tok_visa", // obtained with Stripe.js
//            "description" => "My First Test Charge (created for API docs)"
//        ], [
//            "idempotency_key" => "b4TT7g6DiVnmfNOT",
//        ]);
        try {
            return PaymentIntent::create([
                'amount' => $command->getTotalAmount() * 100,
                'currency' => "usd",
                'customer' => $command->getCustomer()->getSecondaryId(),
                'metadata' => [
                    'order_id' => $command->getId(),
                ]
            ],
            [
                "idempotency_key" => Uuid::uuid4()
            ]);
        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {
            $this->error = "Invalid parameters were supplied to Stripe's API". $e->getMessage();
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
        return null;
    }

    /**
     * @param Command $command
     * @return PaymentIntent|null
     */
    public function retrievePaymentIntent(Command $command)
    {
        try {
            return PaymentIntent::retrieve(
                $command->getSecondaryId()
            );
        } catch (RateLimitException $e) {
            $this->error = "Too many requests made to the API too quickly";
        } catch (InvalidRequestException $e) {
            $this->error = "Invalid parameters were supplied to Stripe's API";
        } catch (AuthenticationException $e) {
            $this->error = "Authentication with Stripe's API failed check keys";
        } catch (ApiConnectionException $e) {
            $this->error = "Network communication with Stripe failed";
        } catch (ApiErrorException $e) {
            $this->error = "check stripe account";
        }catch (\Exception $e) {
            $this->error = "Something else happened, completely unrelated to Stripe";
        }
        return null;

    }
    /**
     * @param Command $command
     * @return array
     */
    protected function getLinesItems(Command $command): array
    {
        $lineItems = [];
        foreach ($command->getCommandItems() as $item) {

            /** @var CommandItem $commandItem */
            $commandItem = $item;

            /**  @var Prestation $prestation */
            $prestation = $commandItem->getPrestation();

            $lineItems[] = [
                'name' => $prestation->getName(),
                'description' => 'Comfortable cotton t-shirt',
                'amount' => !$prestation->getPrice() ? 150 : $prestation->getPrice(),
                'currency' => 'usd',
                'quantity' => !$prestation->getQuantity() ? 5 : $prestation->getQuantity(),
            ];
        }
        return $lineItems;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

}