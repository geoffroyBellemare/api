<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\PaymentIntentAction;


/**
 * Class ShoppingCart
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"get-cart-with-item"}
 *              }
 *          },
 *          "put-PaymentIntent"={
 *                    "method"="PUT",
 *                    "path"="/cart/paymentItent/{id}",
 *                    "controller"= PaymentIntentAction::class,
 *                   "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getCustomer() == user",
 *                   "denormalization_context"={
 *                      "groups"= {"put-payment-intent"}
 *                  }
 *            }
 *     },

 * )
 */
class ShoppingCart
{
    /**
     * @Groups({"get-owner", "posted_user", "get-cart-with-item", "get_user_with_company"})
     * @ORM\GeneratedValue()
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"remove"}, inversedBy="shoppingCart")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false,  onDelete="CASCADE")
     */
    public $customer;

    /**
     * @Groups({"get-owner", "get-cart-with-item"})
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingCartItem", cascade={"persist", "remove"}, mappedBy="cart")
     */
    public $items;

    /**
     * @Groups({"get-owner", "get-item-cart", "get-cart-with-item"})
     * @ORM\Column(type="float")
     */
    private $totalAmount;


    /**
     * @Groups({"get-owner"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Command")
     * @ORM\JoinColumn(name="executing_command_id", referencedColumnName="id", onDelete="SET NULL")
     *
     */
    public $executingCommand;


    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(ShoppingCartItem $item)
    {
        $this->items[] = $item;
        $item->setCart($this);
    }

    public function removeItem(ShoppingCartItem $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
        }
        return $this;
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
     * @return mixed|User
     */
    public function getCustomer()
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
    public function getExecutingCommand()
    {
        return $this->executingCommand;
    }

    /**
     * @param mixed $executingCommand
     */
    public function setExecutingCommand($executingCommand): void
    {
        $this->executingCommand = $executingCommand;
    }







}