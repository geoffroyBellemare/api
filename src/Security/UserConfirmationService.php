<?php


namespace App\Security;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class UserConfirmationService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $manager)
    {
        $this->userRepository = $userRepository;
        $this->manager = $manager;
    }

    public function confirmUser($token) {
        /**
         * @var User $user
         */
        $user = $this->userRepository->findOneBy(["confirmationToken" => $token]);

       if (!$user) {
           throw new NotFoundResourceException();
       }

       $user->setEnabled(true);
       $user->setConfirmationToken(null);
       $this->manager->flush();

    }
}