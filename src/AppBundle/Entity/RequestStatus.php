<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestStatus
 *
 * @ORM\Table(name="request_statuses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RequestStatusRepository")
 */
class RequestStatus
{
    const REQUEST_STATUS_NEW = 'new';
    const REQUEST_STATUS_ACCEPTED = 'accepted';
    const REQUEST_STATUS_CANCELLED = 'cancelled';
    const REQUEST_STATUS_DUPLICATED = 'duplicated';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * RequestStatus constructor.
     * @param string $title
     */
    public function __construct(string $title = 'default')
    {
        $this->title = $title;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return RequestStatus
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

}

