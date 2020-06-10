<?php

use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 *
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext extends \Behatch\Context\RestContext
{
    const USERS = [
        'admin' => 'secret123#',
        'john_doe' => 'secret123#'
    ];
    const AUTH_URL = '/api/login_check';
    const AUTH_JSON = '
        {
            "username": "%s",
            "password": "%s"
        }
    ';
    /**
     * @var \App\DataFixtures\AppFixtures
     */
    private $fixtures;
    /**
     * @var \Coduo\PHPMatcher\Matcher
     */
    private $matcher;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;

    /**
     * @var \App\Entity\ShoppingCart
     */
    private $cart;

    /** @var \App\Entity\User */
    private $user;

    public function __construct(\Behatch\HttpCall\Request $request, \App\DataFixtures\AppFixtures $fixtures, \Doctrine\ORM\EntityManagerInterface $em)
    {
        parent::__construct($request);
        $this->fixtures = $fixtures;
        $this->matcher = (new \Coduo\PHPMatcher\Factory\SimpleFactory())->createMatcher();
        $this->em = $em;
        $this->cart = new \App\Entity\ShoppingCart();
        $this->user = new \App\Entity\User();
    }

    /**
     * @BeforeScenario @createSchema
     */
    public function createSchema()
    {
        // Get entity metadata
        $classes = $this->em->getMetadataFactory()
            ->getAllMetadata();

        // Drop and create schema
        $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
        $schemaTool->dropSchema($classes);
        $schemaTool->createSchema($classes);

        // Load fixtures... and execute
        $purger = new \Doctrine\Common\DataFixtures\Purger\ORMPurger($this->em);
        $fixturesExecutor =
            new \Doctrine\Common\DataFixtures\Executor\ORMExecutor(
                $this->em,
                $purger
            );

        $fixturesExecutor->execute([
            $this->fixtures
        ]);
    }

    /**
     * @Given I am company owner as :user
     */
    public function iAmCompanyOwner($user)
    {
        $userRep = $this->em->getRepository(\App\Entity\User::class);
        /** @var \App\Entity\User $entity */
        $entity = $userRep->findOneBy(["username"=> $user]);

        if (!$entity) {
            $this->assertTrue(false, "Cant find user");
            return;
        }
        if ($entity->getCompany()) {
            $this->assertTrue(true, "you are company owner");
        } else {
            $this->assertTrue(false, "you Must be an company owner");
        }

    }
    /**
     * @Given I am authenticated as :user
     */
    public function iAmAuthenticatedAs($user)
    {
        $this->request->setHttpHeader('Content-Type', 'application/ld+json');
        $this->request->send(
            'POST',
            $this->locatePath(self::AUTH_URL),
            [],
            [],
            sprintf(self::AUTH_JSON, $user, self::USERS[$user])
        );
        $this->user->setUsername($user);
        $json = json_decode($this->request->getContent(), true);
        // Make sure the token was returned
        $this->assertTrue(isset($json['token']));

        $token = $json['token'];

        $this->request->setHttpHeader(
            'Authorization',
            'Bearer '.$token
        );
    }

    /**
     * @Then the JSON matches expected template:
     */
    public function theJsonMatchesExpectedTemplate(\Behat\Gherkin\Node\PyStringNode $json)
    {
        $actual = $this->request->getContent();
        var_dump($actual);
        $this->assertTrue(
            $this->matcher->match($actual, $json->getRaw())
        );
    }

    /**
     * @Then I should have :quantity product in the cart for :user
     */
    public function iShouldHaveOneProductInTheCart($quantity, $user)
    {

        $userRep = $this->em->getRepository(\App\Entity\User::class);
        $this->user = $userRep->findOneBy(["username"=> $user]);
        $this->cart = $this->user->getShoppingCart();
        $this->assertCount($quantity, $this->cart->getItems()->toArray());

    }
    /**
     * @Then I should have :quantity times in the cart for item :id
     */
    public function iShouldHaveOneCartIemTheCart($quantity, $id)
    {
        $carItemRep = $this->em->getRepository(\App\Entity\ShoppingCartItem::class);
        /** @var \App\Entity\ShoppingCartItem $cartItem */
        $cartItem = $carItemRep->findOneBy(["id"=> $id]);
        $this->assertEquals($quantity, $cartItem->quantity);

    }
    /**
     * @Then The totalAmount should be :price
     */
    public function theTotalAmountShouldBe($price)
    {
//        $userRep = $this->em->getRepository(\App\Entity\User::class);
//        $entity = $userRep->findOneBy(["username"=> $user]);
//        /** @var \App\Entity\ShoppingCart $cart */
//        $cart = $entity->getShoppingCart();
        var_dump($this->cart->getTotalAmount());
        $this->assertEquals($this->cart->getTotalAmount(), $price);
    }
    /**
     * @Then The User cart is in pending state
     */
    public function theUserCartIsPending()
    {
        $userRep = $this->em->getRepository(\App\Entity\User::class);
        $entity = $userRep->findOneBy(["username"=> $this->user->getUsername()]);
        /** @var \App\Entity\ShoppingCart $cart */
        $cart = $entity->getShoppingCart();

        $this->assertTrue($cart->getExecutingCommand());
    }

}
