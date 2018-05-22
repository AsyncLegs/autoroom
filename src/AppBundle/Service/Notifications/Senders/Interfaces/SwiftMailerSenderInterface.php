<?php

namespace AppBundle\Service\Notifications\Senders\Interfaces;

interface SwiftMailerSenderInterface
{
    /**
     * @param \Swift_Message $message
     * @return int
     */
    public function send(\Swift_Message $message): int;
}