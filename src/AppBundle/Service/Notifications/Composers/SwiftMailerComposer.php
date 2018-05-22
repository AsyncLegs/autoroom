<?php

namespace AppBundle\Service\Notifications\Composers;

use AppBundle\Entity\Requests\Interfaces\NotificationInterface;
use AppBundle\Service\Notifications\Composers\Interfaces\SwiftMailerComposerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

class SwiftMailerComposer implements SwiftMailerComposerInterface
{
    private $notificationsMappings;
    private $template;
    private $logger;

    /**
     * SwiftMailerComposer constructor.
     * @param array           $notificationsMappings
     * @param TwigEngine      $template
     * @param LoggerInterface $logger
     */
    public function __construct(array $notificationsMappings, $template, LoggerInterface $logger)
    {
        $this->notificationsMappings = $notificationsMappings;
        $this->template = $template;
        $this->logger = $logger;
    }

    /**
     * @param NotificationInterface $notification
     * @return \Swift_Message
     */
    public function compose(NotificationInterface $notification): ?\Swift_Message
    {
        $currentMessageConfig = $this->notificationsMappings[$notification->getClassName()];
        $message = new \Swift_Message();
        try {
            $message
                ->setSubject($currentMessageConfig['subject'])
                ->setFrom($this->notificationsMappings['from'])
                ->setTo($this->notificationsMappings['to'])
                ->setBody(
                    $this->template->render(
                        \sprintf('@App/emails/%s', $currentMessageConfig['template']),
                        ['notification' => $notification]
                    ),
                    'text/html'
                );

        } catch (\Exception $e) {
            $this->logger->critical(\sprintf('Could not compose a SwiftMessage: %s', $e->getMessage()));
        }

        return $message;
    }
}
