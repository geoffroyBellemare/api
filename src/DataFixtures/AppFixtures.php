<?php

namespace App\DataFixtures;

use App\Entity\Command;
use App\Entity\CommandItem;
use App\Entity\Comment;
use App\Entity\Company;
use App\Entity\Image;

use App\Entity\Prestation;
use App\Entity\ShoppingCart;
use App\Entity\Spot;
use App\Entity\User;
use App\Security\TokenGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private const USERS = [
        [
            'username' => 'admin',
            'email' => 'admin@blog.com',
            'name' => 'Piotr Jura',
            'password' => 'secret123#',
            'roles' => [User::ROLE_SUPERADMIN],
            'enabled' => true
        ],
        [
            'username' => 'john_doe',
            'email' => 'john@blog.com',
            'name' => 'John Doe',
            'password' => 'secret123#',
            'roles' => [User::ROLE_ADMIN],
            'enabled' => true
        ],
        [
            'username' => 'rob_smith',
            'email' => 'rob@blog.com',
            'name' => 'Rob Smith',
            'password' => 'secret123#',
            'roles' => [User::ROLE_WRITER],
            'enabled' => true
        ],
        [
            'username' => 'jenny_rowling',
            'email' => 'jenny@blog.com',
            'name' => 'Jenny Rowling',
            'password' => 'secret123#',
            'roles' => [User::ROLE_WRITER],
            'enabled' => true
        ],
        [
            'username' => 'han_solo',
            'email' => 'han@blog.com',
            'name' => 'Han Solo',
            'password' => 'secret123#',
            'roles' => [User::ROLE_EDITOR],
            'enabled' => false
        ],
        [
            'username' => 'jedi_knight',
            'email' => 'jedi@blog.com',
            'name' => 'Jedi Knight',
            'password' => 'secret123#',
            'roles' => [User::ROLE_COMMENTATOR],
            'enabled' => true
        ],
    ];
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var \Faker\Factory
     */
    private $faker;
    /**
     * @var TokenGenerator
     */
    private $tokenGenerator;


    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, TokenGenerator $tokenGenerator)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->faker = \Faker\Factory::create();

        $this->tokenGenerator = $tokenGenerator;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);

        $this->loadCompanies($manager);

        $this->loadPrestations($manager);
        $this->loadCommands($manager);
        /*//$this->loadOrders($manager);
        $this->loadSpots($manager);
        $this->loadComments($manager);
        */
    }
    public function loadSpots(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $spot = new Spot();
            $spot->setTitle($this->faker->title);
            $spot->setName($this->faker->name);
            $spot->setContent($this->faker->realText(40));
            $spot->setPublished($this->faker->dateTimeThisYear);
            $spot->setSlug($this->faker->slug);
            $spot->setAuthor($this->getRandomUserReference($spot));

            $this->addReference("spot_$i", $spot);
            $manager->persist($spot);
        }
        $manager->flush();
    }
    public function loadComments(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $spot = $this->getReference("spot_$i");
            for ($j = 0; $j < rand(0, 10); $j++) {
                $comment = new Comment();
                $comment->setContent($this->faker->realText(30));
                $comment->setPublished($this->faker->dateTimeThisYear);
                $comment->setAuthor(
                    $this->getRandomUserReference($comment)
                );
                $comment->setSpot($spot);
                $manager->persist($comment);
            }
        }
        $manager->flush();
    }
    public function loadUsers(ObjectManager $manager)
    {
        foreach (self::USERS as $data) {
            $user = new User();
            $user->setName($data["name"]);
            $user->setUsername($data["username"]);
            $user->setRoles($data["roles"]);
            $user->setEmail($data["email"]);

            $user->setEnabled($data['enabled']);
            $shoppingCart = new ShoppingCart();
            $shoppingCart->setTotalAmount(0);
            $shoppingCart->setCustomer($user);
            $user->setShoppingCart($shoppingCart);

            if (! $data['enabled']) {
                $user->setConfirmationToken(
                    $this->tokenGenerator->getRandomSecureToken()
                );
            }
            $user->setPassword($this->passwordEncoder->encodePassword($user, $data["password"]));

            //User Image Profile///////
            $image = $this->loadImageProfile($user);
            $user->setImageProfile($image);

            //User Company/////////////
            //$company = $this->loadCompany($user);
            //$user->setCompany($company);

            $this->addReference("user_". $data['username'], $user);
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function loadCompanies(ObjectManager $manager): void
    {
        foreach (self::USERS as $data) {
            /**
             * @var User $user
             */
            //$user = $this->getReference("user_". $data['username']);
//            $company = new Company();
//            $company->setName($this->faker->name);
//            $company->setAuthor($user);
//            $this->addReference("user_company_admin", $company);
//            $user->setCompany($company);
//            $manager->persist($user);
        }
        /**
         * @var User $user
         */
        $user = $this->getReference("user_admin");
        $company = new Company();
        $company->setName($this->faker->name);
        $company->setAuthor($user);
        $this->addReference("user_company_admin", $company);
        $user->setCompany($company);
        $manager->persist($user);
        $manager->flush();
    }

    public function loadPrestations(ObjectManager $manager): void
    {
        foreach (self::USERS as $data) {
            /**
             * @var Company $company
             */
            //$company = $this->getReference("user_company_".$data['username']);
            $company = $this->getReference("user_company_admin");
            $prestation = new Prestation();
            $prestation->setName($this->faker->name);
            $prestation->setPrice(10);
            $prestation->setQuantity(8);
            $company->addPrestation($prestation);
            $manager->persist($prestation);
        }
        $manager->flush();
    }

    public function loadCommands(ObjectManager $manager) {
        foreach (self::USERS as $data) {
            /**
             * @var User $customer
             */
            $customer = $this->getReference("user_".$data['username']);
            /**
             * @var Company $company
             */
            $company = $this->getRandomCompany($data['username']);


            $order = new Command();
            $order->setCustomer($customer);
            $order->setCreated($this->faker->dateTimeThisYear);
            $order->setTotalAmount(100);
            $order->setState("pending");

            $manager->persist($order);
           // var_dump($company->getName());
            /**
             * @var Prestation $prestat
             */
            $prestat = ($company->getPrestations())[0];

            var_dump($prestat->getId());
            $item = new CommandItem();
            $item->setPrestation($prestat);
            $item->setQuantity(2);
            $item->setTotalAmount(2 * $prestat->getPrice());
            $item->setStartTime($this->faker->dateTimeThisYear);
            $item->setEndTime($this->faker->dateTimeThisYear);
            $item->setCommand($order);
            $manager->persist($item);
            //$order->add($item);



        }
        $manager->flush();
    }
    public function loadImageProfile($entity): Image
    {
        if ($entity instanceof User) {
            //auto persist by parent
            $image = new Image();
            $image->setUrl("aws/test.jpeg");
            $image->setAuthor($entity);

            return $image;
        }
    }

    /**
     * @return mixed
     */
    protected function getRandomCompany($username = "jean")
    {

        return $this->getReference(
            'user_company_admin'
        );
        $randomUser = self::USERS[rand(0, 5)];

        if ($randomUser["username"] == $username ) {
            return $this->getRandomCompany();
        }
        return $this->getReference(
            'user_company_'.$randomUser['username']
        );
    }
    protected function getRandomUserReference($entity): User
    {
        $randomUser = self::USERS[rand(0, 5)];

        if ($entity instanceof Spot && !count(
                array_intersect(
                    $randomUser['roles'],
                    [User::ROLE_SUPERADMIN, User::ROLE_ADMIN, User::ROLE_WRITER]
                )
            )) {
            return $this->getRandomUserReference($entity);
        }
        if ($entity instanceof Comment && !count(
                array_intersect(
                    $randomUser['roles'],
                    [
                        User::ROLE_SUPERADMIN,
                        User::ROLE_ADMIN,
                        User::ROLE_WRITER,
                        User::ROLE_COMMENTATOR,
                    ]
                )
            )) {
            return $this->getRandomUserReference($entity);
        }

        return $this->getReference(
            'user_'.$randomUser['username']
        );
    }
}

