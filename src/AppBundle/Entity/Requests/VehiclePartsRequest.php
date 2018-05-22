<?php

namespace AppBundle\Entity\Requests;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PartsRequest
 *
 * @ORM\Table(name="vehicle_parts_request")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartsRequestRepository")
 */
class VehiclePartsRequest extends BaseRequest
{

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=255)
     * @Assert\Email(checkMX=true)
     * @Assert\NotBlank()
     */
    private $customerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="vin_code", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $vinCode;

    /**
     * @var string
     *
     * @ORM\Column(name="carBrand", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $carBrand;

    /**
     * @var string
     *
     * @ORM\Column(name="carModel", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $carModel;

    /**
     * @var int
     *
     * @ORM\Column(name="carReleaseDate", type="integer")
     * @Assert\NotBlank()
     */
    private $carReleaseYear;


    /**
     * @var string
     * @ORM\Column(name="parts", type="text")
     * @Assert\NotBlank()
     */
    private $parts;

    /**
     * @return string
     */
    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     * @return VehiclePartsRequest
     */
    public function setCustomerEmail(string $customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getVinCode(): ?string
    {
        return $this->vinCode;
    }

    /**
     * @param string $vinCode
     * @return VehiclePartsRequest
     */
    public function setVinCode(string $vinCode)
    {
        $this->vinCode = $vinCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarBrand(): ?string
    {
        return $this->carBrand;
    }

    /**
     * @param string $carBrand
     * @return VehiclePartsRequest
     */
    public function setCarBrand(string $carBrand)
    {
        $this->carBrand = $carBrand;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarModel(): ?string
    {
        return $this->carModel;
    }

    /**
     * @param string $carModel
     * @return VehiclePartsRequest
     */
    public function setCarModel(string $carModel)
    {
        $this->carModel = $carModel;

        return $this;
    }

    /**
     * @return int
     */
    public function getCarReleaseYear(): ? int
    {

        return $this->carReleaseYear;
    }

    /**
     * @param int $carReleaseYear
     * @return VehiclePartsRequest
     */
    public function setCarReleaseYear(?int $carReleaseYear)
    {
        $this->carReleaseYear = $carReleaseYear;

        return $this;
    }

    /**
     * @return string
     */
    public function getParts(): ?string
    {
        return $this->parts;
    }

    /**
     * @param string $parts
     * @return VehiclePartsRequest
     */
    public function setParts(string $parts)
    {
        $this->parts = $parts;

        return $this;
    }

}

