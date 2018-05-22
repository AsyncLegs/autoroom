<?php

namespace AppBundle\Event;

use AppBundle\Entity\Requests\BaseRequest;
use Symfony\Component\EventDispatcher\Event;

class FormRequestEvent extends Event
{
    protected $formRequest;

    /**
     * CallbackRequest constructor.
     * @param BaseRequest $formRequest
     */
    public function __construct(BaseRequest $formRequest)
    {
        $this->formRequest = $formRequest;
    }

    /**
     * @return BaseRequest
     */
    public function getRequest(): BaseRequest
    {
        return $this->formRequest;
    }



}