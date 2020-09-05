<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\CompanyTokensAction;
use App\Validators\Constraints as SGAssert;




/**
 * Class Company
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put",
 *          "delete",
 *          "put-company-tokens"={
 *                  "method"="PUT",
 *                  "path"="/company/{id}/tokens",
 *                  "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getAuthor() == user",
 *                  "controller"=CompanyTokensAction::class,
 *         },
 *     },
 *     collectionOperations={
 *          "get",
 *          "post-company-tokens"={
 *            "method"="POST",
 *            "path"="/company/tokens",
 *            "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *            "controller"=CompanyTokensAction::class,
 *
 *          }
 *     }
 * )
 */
class Company
{
    /**
     * @Groups({"get-owner", "get-prestation-with-author", "get_command_with_item"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @Groups({"get-owner", "get_user_with_company", "get-prestation-with-author"})
     * @ORM\Column(type="string", nullable=false)
     */
    public $account_id;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public $person_id;
    /**
     * @Groups({"get-owner", "get-admin"})
     * @ORM\Column(type="string", nullable=true)
     */
    public $status;
    /**
     * @Groups({"get-owner", "get-admin"})
     * @ORM\Column(type="integer")
     */
    public $step;
    /**
     * @Groups({"get-owner", "get-admin"})
     * @ORM\Column(type="string")
     */
    public $business_type;
    /**
     * @Groups({"get-owner", "get_user_with_company", "get-prestation-with-author"})
     * @ORM\Column(type="string", nullable=false)
     */
    public $name;

    /**
     * @Groups({"get-prestation-with-author"})
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist"}, mappedBy="company")
     * @ORM\JoinColumn(nullable=false)
     */
    public $author;



    /**
     * @Groups({"get-owner", "get_user_with_company"})
     * @ORM\OneToMany(targetEntity="App\Entity\Prestation", cascade={"persist", "remove"}, mappedBy="company")
     * @ApiSubresource()
     */

    public $prestations;

    /**
     * @Groups({"get-owner", "get_user_with_company"})
     * @ORM\OneToMany(targetEntity="App\Entity\Administration", cascade={"persist", "remove"}, mappedBy="company")
     */
    public $administrations;

    public function __construct()
    {
        $this->prestations = new ArrayCollection();
        $this->administrations = new ArrayCollection();
    }
    /**
     * @param Administration $administration
     */
    public function addAdministrator(Administration $administration)
    {
        if ($this->administrations->contains($administration)) {
            return;
        }
        $this->administrations->add($administration);
    }

    /**
     * @param Administration $administration
     */
    public function removeAdministrator(Administration $administration)
    {
        if (!$this->administrations->contains($administration)) {
            return;
        }

        $this->administrations->removeElement($administration);
    }
    /**
     * @param Prestation $prestation
     */
    public function addPrestation(Prestation $prestation) {
        $this->prestations[] = $prestation;
        $prestation->setCompany($this);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    /**
     * @return Collection
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * @param mixed $account_id
     */
    public function setAccountId($account_id): void
    {
        $this->account_id = $account_id;
    }


    /**
     * @return string|null
     */
    public function getPersonId(): ?string
    {
        return $this->person_id;
    }

    /**
     * @param mixed $person_id
     */
    public function setPersonId($person_id): void
    {
        $this->person_id = $person_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param mixed $step
     */
    public function setStep($step): void
    {
        $this->step = $step;
    }

    /**
     * @return mixed
     */
    public function getBusinessType()
    {
        return $this->business_type;
    }

    /**
     * @param mixed $business_type
     */
    public function setBusinessType($business_type): void
    {
        $this->business_type = $business_type;
    }

    /**
     * @param $status
     */
    public function setSuccessStatus($status) {
        $newStatus = "verified";
        $array = array(0 => 'company', 1 => 'person', 2 => 'external_account');

        $key = array_search($status, $array); // $key = 2;
        if ($key !== 2) {
            $newStatus =  $array[$key + 1];
        }
        $this->setStatus($newStatus);
    }

}