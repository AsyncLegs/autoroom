<?php

namespace AppBundle\Service\Notifications\Composers\Interfaces;


use AppBundle\Entity\Requests\Interfaces\NotificationInterface;

interface NotificationComposerInterface
{
    /**
     * @param NotificationInterface $request
     * @return mixed
     */
    public function compose(NotificationInterface $request);
}