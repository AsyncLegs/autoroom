<?php

namespace AppBundle\Entity\Requests\Interfaces;

use AppBundle\Entity\RequestStatus;

interface NotificationInterface
{
    /**
     * @return RequestStatus|null
     */
    public function getStatus(): ? RequestStatus;

    /**
     * @param mixed $status
     */
    public function setStatus(RequestStatus $status);
}