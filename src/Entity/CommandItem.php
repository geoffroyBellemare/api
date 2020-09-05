<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class CommandItem
 * @ORM\Entity()
 * @ApiResource()
 */
class CommandItem
{
    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @Groups({"get-owner", "get_command_with_item", "get-user-with-commands"})
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
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Column(type="integer")
     */
    public $quantity;

    /**
     * @Groups({"get-owner", "get_command_with_item"})
     * @ORM\Column(type="float")
     */
    public $totalAmount;

    /**
     * @Groups({"get_command_with_item"})
     * @ORM\Column(type="datetime")
     */
    public $startTime;

    /**
     * @Groups({"get_command_with_item"})
     * @ORM\Column(type="datetime")
     */
    public $endTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Command", inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    public $command;

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
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param Command $command
     */
    public function setCommand($command): void
    {
        $this->command = $command;
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


}