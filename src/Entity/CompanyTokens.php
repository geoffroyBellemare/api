<?php


namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validators\Constraints as SGAssert;




/**
 * Class Company
 * @SGAssert\AlreadyCompanyOwner()
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "path"="/tokens",
 *              "denormalization_context"={
 *                      "groups"= {"post-company-token"}
 *                  }
 *          }
 *     },
 *     itemOperations={}
 * )
 */
class CompanyTokens
{

    public $accountToken;


    public $externalAccountToken;

    public $personToken;

    public $personUpdateToken;

    public $status;

    public $step;

    public $business_type;


    /**
     * @return string|null
     */
    public function getAccountToken(): ?string
    {
        return $this->accountToken;
    }

    /**
     * @param mixed $accountToken
     */
    public function setAccountToken($accountToken): void
    {
        $this->accountToken = $accountToken;
    }


    /**
     * @return string|null
     */
    public function getExternalAccountToken(): ?string
    {
        return $this->externalAccountToken;
    }

    /**
     * @param mixed $externalAccountToken
     */
    public function setExternalAccountToken($externalAccountToken): void
    {
        $this->externalAccountToken = $externalAccountToken;
    }


    /**
     * @return string|null
     */
    public function getPersonToken(): ?string
    {
        return $this->personToken;
    }

    /**
     * @param mixed $personToken
     */
    public function setPersonToken($personToken): void
    {
        $this->personToken = $personToken;
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
     * @return mixed
     */
    public function getPersonUpdateToken()
    {
        return $this->personUpdateToken;
    }

    /**
     * @param mixed $personUpdateToken
     */
    public function setPersonUpdateToken($personUpdateToken): void
    {
        $this->personUpdateToken = $personUpdateToken;
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



}