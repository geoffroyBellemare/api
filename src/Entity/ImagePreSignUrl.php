<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "path"="/image/presign",
 *          }
 *     },
 *     itemOperations={}
 * )
 */
class ImagePreSignUrl
{
    /**
     * @Assert\NotBlank()
     */
    public $preSignUrl;
}