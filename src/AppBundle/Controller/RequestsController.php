<?php

namespace AppBundle\Controller;

use AppBundle\Controller\Base\BaseAjaxController;
use AppBundle\Entity\Requests\CallbackRequest;
use AppBundle\Entity\Requests\MaintenanceRequest;
use AppBundle\Entity\Requests\VehiclePartsRequest;
use AppBundle\Entity\RequestStatus;
use AppBundle\Event\FormRequestEvent;
use AppBundle\Event\RequestsEvents;
use AppBundle\Form\CallbackRequestForm;
use AppBundle\Form\MaintenanceRequestForm;
use AppBundle\Form\VehiclePartsRequestForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RequestsController extends BaseAjaxController
{

    /**
     * @Route(name="callbackRequest", path="requests/callback")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callbackAction(Request $request)
    {
        if ($request->isXmlHttpRequest() && $request->isMethod('POST')) {
            $callbackRequest = new CallbackRequest();
            $callbackForm = $this->createForm(CallbackRequestForm::class, $callbackRequest);
            $callbackForm->handleRequest($request);
            if ($callbackForm->isSubmitted() && $callbackForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $this->response = ['success'];
                $requestStatus = $em->getRepository('AppBundle:RequestStatus')->findByTitle(
                    RequestStatus::REQUEST_STATUS_NEW
                );
                $callbackRequest->setStatus($requestStatus);
                try {
                    $em->persist($callbackRequest);
                    $em->flush();
                    $this->dispatchEvent(RequestsEvents::CALLBACK_CREATED, new FormRequestEvent($callbackRequest));
                } catch (\Exception $e) {
                    $this->get('logger')->err('Could not save a new callback request: ' . $e->getMessage());
                }

            } else {
                $this->response['status'] = 'error';
                $this->response['errors'] = $this->getErrors($callbackForm);
            }

        }

        return new JsonResponse($this->response);
    }

    /**
     * @Route(name="maintenanceRequest", path="requests/maintenance")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function maintenanceAction(Request $request)
    {
        if ($request->isXmlHttpRequest() && $request->isMethod('POST')) {
            $maintenanceRequest = new MaintenanceRequest();
            $maintenanceForm = $this->createForm(MaintenanceRequestForm::class, $maintenanceRequest);
            $maintenanceForm->handleRequest($request);
            if ($maintenanceForm->isSubmitted() && $maintenanceForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $this->response = ['success'];
                $requestStatus = $em->getRepository('AppBundle:RequestStatus')->findByTitle(
                    RequestStatus::REQUEST_STATUS_NEW
                );
                $maintenanceRequest->setStatus($requestStatus);
                $em->persist($maintenanceRequest);
                $em->flush();
                $this->dispatchEvent(RequestsEvents::MAINTENANCE_REQUEST, new FormRequestEvent($maintenanceRequest));

            } else {
                $this->response['status'] = 'error';
                $this->response['errors'] = $this->getErrors($maintenanceForm);
            }
        }

        return new JsonResponse($this->response);
    }

    /**
     * @Route(name="vehiclesRequest", path="requests/vehicles")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function vehiclePartRequestAction(Request $request)
    {
        if ($request->isXmlHttpRequest() && $request->isMethod('POST')) {
            $vehicleRequest = new VehiclePartsRequest();
            $vehicleRequestForm = $this->createForm(VehiclePartsRequestForm::class, $vehicleRequest);
            $vehicleRequestForm->handleRequest($request);
            if ($vehicleRequestForm->isSubmitted() && $vehicleRequestForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $this->response = ['success'];
                $requestStatus = $em->getRepository('AppBundle:RequestStatus')->findByTitle(
                    RequestStatus::REQUEST_STATUS_NEW
                );
                $vehicleRequest->setStatus($requestStatus);
                $em->persist($vehicleRequest);
                $em->flush();
                $this->dispatchEvent(RequestsEvents::VEHICLE_PARTS_REQUEST, new FormRequestEvent($vehicleRequest));

            } else {
                $this->response['status'] = 'error';
                $this->response['errors'] = $this->getErrors($vehicleRequestForm);
                $this->response['error'] = $vehicleRequestForm;
            }
        }

        return new JsonResponse($this->response);
    }
}
