<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\ResetPasswordAction;

/**
 * @ApiResource(
 *     itemOperations={
 *           "get"={
 *                  "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *                  "normalization_context"={
 *                      "groups"={"get_user"}
 *                  }
 *            },
 *            "put"={
 *                   "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *                   "denormalization_context"={
 *                      "groups"= {"put"}
 *                  },
 *                  "normalization_context"={
 *                      "groups"={"get_user"}
 *                  }
 *            },
 *            "put-reset-password"={
 *                    "method"="PUT",
 *                    "path"="/users/{id}/reset-password",
 *                    "controller"= ResetPasswordAction::class,
 *                   "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *                   "denormalization_context"={
 *                      "groups"= {"put-reset-password"}
 *                  }
 *            }
 *      },
 *     collectionOperations={
 *          "get"= {
 *               "normalization_context"={
 *                      "groups"={ "get_user"}
 *                }
 *          },
 *          "post"={
 *                  "denormalization_context"= {
 *                      "groups"= {"post"}
 *                  },
 *                  "normalization_context"={
 *                      "groups"={"posted_user"}
 *                  }
 *          }
 *      }
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User implements UserInterface
{
    const ROLE_COMMENTATOR = 'ROLE_COMMENTATOR';
    const ROLE_WRITER = 'ROLE_WRITER';
    const ROLE_EDITOR = 'ROLE_EDITOR';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';

    const DEFAULT_ROLES = [self::ROLE_COMMENTATOR];

    /**
     * @Groups({"get_user", "posted_user", "get-prestation-with-author"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"get_user", "posted_user", "get-prestation-with-author"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryId;

    /**
     * @Groups({"get_user", "posted_user", "post", "get-prestation-with-author", "get-comment-with-author", "get-spot-with-author"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(groups={"post"})
     */
    private $username;

    /**
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"post"})
     * @Assert\NotBlank(groups={"post", "posted_user"})
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
     *     message="Password must be seven characters min",
     *     groups={"post"}
     * )
     */
    private $password;

    /**
     * @Groups({"post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Expression(
     *    "this.getPassword() === this.getRetypePassword()",
     *     message="Passwords does not match",
     *     groups={"post"}
     * )
     */
    private $retypePassword;

    /**
     * @Groups({"put-reset-password"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
     *     message="Password must be seven characters min",
     * )
     */
    private $newPassword;

    /**
     * @Groups({"put-reset-password"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @Assert\Expression(
     *    "this.getNewPassword() === this.getNewRetypePassword()",
     *     message="Passwords does not match"
     * )
     */
    private $newRetypePassword;

    /**
     * @Groups({"put-reset-password"})
     * @UserPassword(groups={"put-reset-password"})
     */
    private $oldPassword;

    /**
     * @Assert\NotBlank(groups={"post", "posted_user"})
     * @ORM\Column(type="string", length=255)
     * @Groups({"get_user", "put", "post"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"put", "post", "get-admin", "get-owner", "posted_user"})
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Spot", mappedBy="author")
     * @Groups({"get"})
     */
    private $spots;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="author")
     * @Groups({"get"})
     */
    private $comments;
    /**
     * @ORM\Column(type="simple_array", length=200)
     * @Groups({"get-admin", "get-owner"})
     */
    private $roles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $passwordChangedDate;

    /**
     *
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $confirmationToken;

    /**
     * @Groups({"get_user", "posted_user", "get-prestation-with-author"})
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist"}, inversedBy="author")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $imageProfile;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", cascade={"persist"}, inversedBy="author")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="SET NULL", nullable=true)
     * @Groups({"get-owner"})
     */
    private $company;

    /**
     * @Groups({"get-owner", "posted_user"})
     * @ORM\OneToOne(targetEntity="App\Entity\ShoppingCart", cascade={"persist", "remove"} , mappedBy="customer")
     */
    private $shoppingCart;

    /**
     * @Groups({"get-owner"})
     * @ORM\OneToMany(targetEntity="App\Entity\Command", cascade={"persist"}, mappedBy="customer")
     */
    private $commands;



    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->spots = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->commands = new ArrayCollection();

        $this->roles = self::DEFAULT_ROLES;
        $this->enabled = false;
        $this->confirmationToken = null;
    }

    /**
     * @return Collection
     */
    public function getCommands(): Collection
    {
        return $this->commands;
    }

    public function getId(): ?int
    {
        return $this->id;
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



    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getSpots(): Collection
    {
        return $this->spots;
    }


    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {

    }

    /**
     * @return mixed
     */
    public function getRetypePassword()
    {
        return $this->retypePassword;
    }

    /**
     * @param mixed $retypePassword
     */
    public function setRetypePassword($retypePassword): void
    {
        $this->retypePassword = $retypePassword;
    }

    /**
     * @return mixed
     */
    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    /**
     * @param mixed $newPassword
     */
    public function setNewPassword($newPassword): void
    {
        $this->newPassword = $newPassword;
    }

    /**
     * @return mixed
     */
    public function getNewRetypePassword(): ?string
    {
        return $this->newRetypePassword;
    }

    /**
     * @param mixed $newRetypePassword
     */
    public function setNewRetypePassword($newRetypePassword): void
    {
        $this->newRetypePassword = $newRetypePassword;
    }

    /**
     * @return mixed
     */
    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }

    /**
     * @param mixed $oldPassword
     */
    public function setOldPassword($oldPassword): void
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @return mixed
     */
    public function getPasswordChangedDate()
    {
        return $this->passwordChangedDate;
    }

    /**
     * @param mixed $passwordChangedDate
     */
    public function setPasswordChangedDate($passwordChangedDate): void
    {
        $this->passwordChangedDate = $passwordChangedDate;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return null
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * @param null $confirmationToken
     */
    public function setConfirmationToken($confirmationToken): void
    {
        $this->confirmationToken = $confirmationToken;
    }

    /**
     * @return mixed
     */
    public function getImageProfile(): ?Image
    {
        return $this->imageProfile;
    }

    /**
     * @param mixed $imageProfile
     */
    public function setImageProfile($imageProfile): void
    {
        $this->imageProfile = $imageProfile;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * @return ShoppingCart
     */
    public function getShoppingCart(): ?ShoppingCart
    {
        return $this->shoppingCart;
    }

    /**
     * @param ShoppingCart $shoppingCart
     */
    public function setShoppingCart(ShoppingCart $shoppingCart): void
    {
        $this->shoppingCart = $shoppingCart;
    }



}
