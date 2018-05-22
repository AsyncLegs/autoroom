<?php
/**
 * Created by PhpStorm.
 * User: thawy
 * Date: 9/13/17
 * Time: 8:26 PM
 */

namespace AppBundle\Controller\Base;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Form\FormInterface;

class BaseController extends Controller
{
    /**
     * @param FormInterface $form
     * @return array
     */
    protected function getErrors(FormInterface $form): array
    {
        $errors = [];
        foreach ($form->all() as $key => $child) {
            if (!$child->isValid()) {
                foreach ($child->getErrors() as $error) {
                    $errors[$key] = $error->getMessage();
                }
            }
        }

        return $errors;
    }

    /**
     * @param string $type
     * @param Event  $event
     */
    protected function dispatchEvent(string $type, Event $event)
    {
        $dispatcher = $this->get('event_dispatcher');
        $dispatcher->dispatch(
            $type,
            $event
        );
    }

}