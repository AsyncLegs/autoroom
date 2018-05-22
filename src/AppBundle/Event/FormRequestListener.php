<?php

namespace AppBundle\Event;

use AppBundle\Service\Notifications\Composers\SwiftMailerComposer;
use AppBundle\Service\Notifications\Senders\SwiftMailerSenderService;

class FormRequestListener
{

    protected $mailComposer;
    protected $mailSender;

    /**
     * FormRequestListener constructor.
     * @param SwiftMailerSenderService $mailSender
     * @param SwiftMailerComposer $mailComposer
     */
    public function __construct(SwiftMailerSenderService $mailSender, SwiftMailerComposer $mailComposer)
    {
        $this->mailSender = $mailSender;
        $this->mailComposer = $mailComposer;
    }

    /**
     * @param FormRequestEvent $formRequestEvent
     */
    public function onFormRequestCreated(FormRequestEvent $formRequestEvent)
    {
        $formRequest = $formRequestEvent->getRequest();
        try {

            $message = $this->mailComposer->compose($formRequest);
            $this->mailSender->send($message);
        } catch (\Exception $e) {
            //
        }

    }
}