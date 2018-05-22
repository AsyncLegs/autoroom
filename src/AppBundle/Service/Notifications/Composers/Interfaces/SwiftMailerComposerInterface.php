<?php

namespace AppBundle\Service\Notifications\Composers\Interfaces;

use AppBundle\Entity\Requests\Interfaces\NotificationInterface;

interface SwiftMailerComposerInterface extends NotificationComposerInterface
{
    /**
     * @param NotificationInterface $notification
     * @return mixed
     */
    public function compose(NotificationInterface $notification): ?\Swift_Message;
}