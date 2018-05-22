<?php

namespace AppBundle\Service\Notifications\Senders\Interfaces;

interface NotificationSenderInterface
{

    /**
     * @param string $message
     * @return mixed
     */
    public function send($message);
}