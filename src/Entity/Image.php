<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Image
 * @ORM\Entity()
 * @ApiResource()
 */
class Image
{
    /**
     * @Groups({"get_user", "posted_user", "get-prestation-with-author"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @Groups({"get_user", "posted_user", "get-prestation-with-author"})
     * @ORM\Column(nullable=true)
     */
    public $url;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="imageProfile")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    public $author;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
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



}