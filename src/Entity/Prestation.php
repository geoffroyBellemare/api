<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Annotation\ApiResource;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validators\Constraints as SGAssert;

/**
 * Class Prestation
 * @SGAssert\CompanyOwner()
 * @ORM\Entity()
 * @ApiFilter(PropertyFilter::class, arguments={
 *          "parameterName"="properties",
 *          "overrideDefaultProperties": false,
 *          "whitelist": {"id", "name", "quantity", "price", "company"}
 *     })
 * @ApiResource(
 *
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"get-prestation-with-author"}
 *               }
 *          },
 *          "post"={
 *              "normalization_context"={
 *                  "groups"={"get-prestation-with-author"}
 *               }
 *          },
 *
 *     },
 *
 *     itemOperations={
 *          "put",
 *          "delete"={
 *              "access_control"="(is_granted('IS_AUTHENTICATED_FULLY') and object.getCompany().getAuthor() == user)",
 *              "security_message"="Only admins can add books."
 *     },
 *
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"get-prestation-with-author"}
 *              }
 *          }
 *      },
 * )
 */
class Prestation implements CompanizedEntityInterface
{

    /**
     * @Groups({"get-owner", "get-prestation-with-author", "get-item-cart", "get-cart-with-item", "get_command_with_item"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Groups({"get-owner", "get-item-cart", "get-prestation-with-author", "get-cart-with-item", "get_command_with_item"})
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @Groups({"get-owner","get-item-cart", "get-prestation-with-author", "get_command_with_item", "get-cart-with-item"})
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @Groups({"get-owner", "get-item-cart", "get-prestation-with-author", "get-cart-with-item"})
     * @ORM\Column(type="integer")
     */
    private $quantity;
    /**
     * @Groups({"get-prestation-with-author", "get_command_with_item", "get-cart-with-item"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="prestations")
     * @ORM\JoinColumn(
     *      name="company_id",
     *      referencedColumnName="id",
     *      onDelete="CASCADE",
     *      nullable=false
     * )
     */
    private $company;

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
     * @return mixed
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }



    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }


}