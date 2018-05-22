<?php

namespace AppBundle\Entity\Requests;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MaintenanceRequest
 *
 * @ORM\Table(name="maintenance_request")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaintenanceRequestRepository")
 */
class MaintenanceRequest extends BaseRequest
{


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visit_date", type="datetime")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    protected $visitDate;

    /**
     * Set visitDate
     *
     * @param \DateTime $visitDate
     *
     * @return MaintenanceRequest
     */
    public function setVisitDate($visitDate)
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    /**
     * Get visitDate
     *
     * @return \DateTime
     */
    public function getVisitDate()
    {
        return $this->visitDate;
    }

}

