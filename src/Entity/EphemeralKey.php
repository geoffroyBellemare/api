<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "path"="/ephemeral_key",
 *          }
 *     },
 *     itemOperations={}
 * )
 */
class EphemeralKey
{
    /**
     * @Assert\NotBlank()
     */
    public $version;

}