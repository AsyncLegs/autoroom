<?php

namespace AppBundle\Entity\Requests;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use libphonenumber\PhoneNumber;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;


/**
 * CallbackRequest
 *
 * @ORM\Table(name="callback_requests")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CallbackRequestRepository")
 */
class CallbackRequest extends BaseRequest
{



    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    protected $comment;


    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CallbackRequest
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

}

