<?php



namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={
 *          "delete"={
 *               "access_control"="(is_granted('IS_AUTHENTICATED_FULLY') and object.getCart().getCustomer() == user)",
 *               "normalization_context"={
 *                 "groups"={"get-item-cart"}
 *               }
 *          },
 *          "get",
 *          "put"={
 *              "access_control"="(is_granted('IS_AUTHENTICATED_FULLY') and object.getCart().getCustomer() == user)",
 *              "denormalization_context"={
 *                 "groups"={"put"}
 *             },
 *             "normalization_context"={
 *                 "groups"={"get-item-cart"}
 *             }
 *          }
 *     },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="(is_granted('IS_AUTHENTICATED_FULLY'))",
 *              "denormalization_context"={
 *                 "groups"={"post"}
 *             },
 *             "normalization_context"={
 *                 "groups"={"get-item-cart"}
 *             }
 *          }
 *     }
 * )
 */
class ShoppingCartItem
{
    /**
     * @Groups({"get-owner", "get-item-cart", "get-cart-with-item"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @Groups({"get-item-cart"})
     * @ORM\ManyToOne(targetEntity="App\Entity\ShoppingCart")
     */
    public $cart;

    /**
     * @Groups({"get_command_with_item", "get-cart-with-item"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $checkOutSessionID;

    /**
     * @Groups({"get-owner", "post", "put", "get-item-cart", "get_command_with_item", "get-cart-with-item"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Prestation")
     * @ORM\JoinColumn(
     *      name="prestation_id",
     *      referencedColumnName="id",
     *      onDelete="CASCADE",
     *      nullable=false
     * )
     */
    public $prestation;

    /**
     * @Groups({"get-owner", "get-item-cart", "get_command_with_item", "get-cart-with-item"})
     * @ORM\Column(type="integer")
     */
    public $quantity;

    /**
     * @Groups({"get-owner", "get-item-cart", "get_command_with_item", "get-cart-with-item"})
     * @ORM\Column(type="float")
     */
    public $totalAmount;

    /**
     * @Groups({"post", "get-item-cart", "get-cart-with-item"})
     * @ORM\Column(type="datetime")
     */
    public $startTime;

    /**
     * @Groups({"post", "get-item-cart", "get-cart-with-item"})
     * @ORM\Column(type="datetime")
     */
    public $endTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Command")
     * @ORM\JoinColumn(name="command_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    public $command;


    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param mixed $cart
     */
    public function setCart($cart): void
    {
        $this->cart = $cart;
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
     * @return Prestation
     */
    public function getPrestation()
    {
        return $this->prestation;
    }

    /**
     * @param mixed $prestation
     */
    public function setPrestation($prestation): void
    {
        $this->prestation = $prestation;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
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
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
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
     * @return Command|mixed
     */
    public function getCommand(): ?Command
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     */
    public function setCommand($command): void
    {
        $this->command = $command;
    }


}