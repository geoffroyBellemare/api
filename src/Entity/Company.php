<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Company
 * @ORM\Entity()
 * @ApiResource(
 *     normalizationContext={
 *           "get"
 *     }
 * )
 */
class Company
{
    /**
     * @Groups({"get-owner", "get-prestation-with-author"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

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

    public function __construct()
    {
        $this->prestations = new ArrayCollection();
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




}