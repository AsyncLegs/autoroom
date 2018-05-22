<?php

namespace AppBundle\Entity\Requests;

use AppBundle\Entity\Requests\Interfaces\NotificationInterface;
use AppBundle\Entity\RequestStatus;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use libphonenumber\PhoneNumber;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;


abstract class BaseRequest implements NotificationInterface
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var PhoneNumber
     *
     * @ORM\Column(name="customer_phone", type="phone_number")
     * @Assert\NotBlank()
     * @AssertPhoneNumber(defaultRegion="UA", type="mobile")
     */
    protected $customerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $customerName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * Many Requests have One RequestStatus.
     * @ManyToOne(targetEntity="AppBundle\Entity\RequestStatus")
     * @JoinColumn(name="request_status_id", referencedColumnName="id")
     */
    protected $status;

    /**
     * MaintenanceRequest constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function getCustomerPhone(): ?PhoneNumber
    {
        return $this->customerPhone;
    }

    /**
     * @param PhoneNumber|null $customerPhone
     */
    public function setCustomerPhone(?PhoneNumber $customerPhone)
    {
        $this->customerPhone = $customerPhone;
    }

    /**
     * @return string
     */
    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName(string $customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getStatus(): ? RequestStatus
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return BaseRequest
     */
    public function setStatus(RequestStatus $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return static::class;
    }


}