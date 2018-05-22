<?php

namespace AppBundle\Service\Notifications\Senders;

use Psr\Log\LoggerInterface;

class SwiftMailerSenderService
{
    private $mailer;
    private $logger;

    /**
     * MailSenderService constructor.
     * @param \Swift_Mailer   $mailer
     * @param LoggerInterface $logger
     */
    public function __construct($mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * @param \Swift_Message $message
     */
    public function send(\Swift_Message $message)
    {
        try {
            $this->mailer->send($message);
            $this->logger->info(
                \sprintf(
                    "Email for %s, added to queue for further sending.",
                    $message->getHeaders()
                        ->get('To')->toString()
                )
            );
        } catch (\Exception $e) {
            $this->logger->error(\sprintf("Error with email sending: %s", $e->getMessage()));
        }
    }
}