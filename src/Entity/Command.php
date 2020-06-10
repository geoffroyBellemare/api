<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\StripeHooksAction;
use App\Controller\CommandIntentAction;
use App\Validators\Constraints as SGAssert;


/**
 * Class Command
 * @SGAssert\ShoppingCartNotEmpty()
 * @ORM\Entity()
 * @ApiFilter(
 *     SearchFilter::class,
 *     properties={
 *          "customer"="exact"
 *     }
 * )
 * @ApiFilter(
 *     PropertyFilter::class,
 *     arguments={
 *          "parameterName": "properties",
 *          "overrideDefaultProperties": false,
 *          "whitelist": {"id", "totalPrice", "commandItems"}
 *     }
 * )
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     itemOperations={
 *          "get",
 *          "put"={
 *                 "denormalization_context"={
 *                          "groups"={"put"}
 *                  },
 *                  "normalization_context"={
 *                              "groups"={ "get_command_with_item"}
 *                   }
 *           },
 *          "put-checkout-session"={
 *                  "method"="PUT",
 *                  "path"="/command/{id}/checkout",
 *                  "controller"=CreateCheckoutSession::class,
 *                  "denormalization_context"={
 *                          "groups"= {"post-checkout-session"}
 *                      }
 *         },
 *          "get-paymentIntent"={
 *                    "method"="GET",
 *                    "path"="/command/paymentItent/{id}",
 *                    "controller"= CommandIntentAction::class,
 *                   "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and (object.getCustomer() == user or is_granted('ROLE_ADMIN'))",
 *                   "normalization_context"={
 *                      "groups"= {"put-payment-intent"}
 *                  }
 *            },
 *     },
 *     collectionOperations={
 *                  "get"={
 *                          "normalization_context"={
 *                              "groups"={ "get_command_with_item"}
 *                           }
 *                  },
 *          "post_PaymentIntent"={
 *                    "method"="POST",
 *                    "path"="/command/paymentItent",
 *                    "controller"= CommandIntentAction::class,
 *                   "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *                   "denormalization_context"={
 *                      "groups"= {"put-payment-intent"}
 *                  }
 *            },
 *                  "post"={
 *                      "denormalization_context"={
 *                          "groups"={"post"}
 *                      },
 *                      "normalization_context"={
 *                              "groups"={ "get_command_with_item"}
 *                      }
 *                  },
 *                  "post-hooks"={
 *                      "method"="POST",
 *                      "path"="/commands/hooks",
 *                      "controller"=StripeHooksAction::class,
 *                      "defaults"={"_api_receive"=false}
 *                  }
 *
 *     }
 * )
 */
class Command
{

    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryId;

    /**
     * @Groups({"get_command_with_item"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $checkOutSessionID;

    /**
     * @Groups({"get-owner", "get_command_with_item", "put-payment-intent"})
     * @ORM\Column(type="float", nullable=false, options={"default": 0})
     *
     */
    private $totalAmount;

    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $created;

    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Column(type="string")
     */
    private $state;

    /**
     *
     * @Groups({"get_command_with_item"})
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"}, inversedBy="commands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;
    
    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\OneToMany(targetEntity="App\Entity\CommandItem", cascade={"persist", "remove"}, mappedBy="command")
     * @ApiSubresource()
     */
    private $commandItems;


    /**
     * @Groups({"get_command_with_item"})
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingCartItem", cascade={"persist", "remove"}, mappedBy="command")
     * @ApiSubresource()
     */
    public $shoppingCartItems;




    public function __construct()
    {
        $this->commandItems = new ArrayCollection();
        $this->shoppingCartItems = new ArrayCollection();
    }

    public function addCartItem(ShoppingCartItem $item) {
//        $this->shoppingCartItems[] = $item;
//        $item->setCommand($this);

        $commandItem = new CommandItem();
        $commandItem->setTotalAmount($item->getTotalAmount());
        $commandItem->setQuantity($item->getQuantity());
        $commandItem->setPrestation($item->getPrestation());
        $commandItem->setStartTime($item->getStartTime());
        $commandItem->setEndTime($item->getEndTime());
        $this->add($commandItem);
    }

    /**
     * @param CommandItem $item
     */
    public function add(CommandItem $item) {
        $this->commandItems[] = $item;
        $item->setCommand($this);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param mixed $totalAmount
     */
    public function setTotalAmount($totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return User|null
     */
    public function getCustomer(): ?User
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Collection
     */
    public function getCommandItems(): Collection
    {
        return $this->commandItems;
    }

    /**
     * @return mixed
     */
    public function getCheckOutSessionID(): ? string
    {
        return $this->checkOutSessionID;
    }

    /**
     * @param mixed $checkOutSessionID
     */
    public function setCheckOutSessionID($checkOutSessionID): void
    {
        $this->checkOutSessionID = $checkOutSessionID;
    }

    /**
     * @return Collection
     */
    public function getShoppingCartItems(): Collection
    {
        return $this->shoppingCartItems;
    }

    /**
     * @return mixed
     */
    public function getSecondaryId()
    {
        return $this->secondaryId;
    }

    /**
     * @param mixed $secondaryId
     */
    public function setSecondaryId($secondaryId): void
    {
        $this->secondaryId = $secondaryId;
    }



}