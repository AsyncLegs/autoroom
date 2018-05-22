<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\RequestStatus;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class RequestStatusFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $newRequestStatus = new RequestStatus(RequestStatus::REQUEST_STATUS_NEW);
        $acceptedRequestStatus = new RequestStatus(RequestStatus::REQUEST_STATUS_ACCEPTED);
        $cancelledRequestStatus = new RequestStatus(RequestStatus::REQUEST_STATUS_CANCELLED);
        $duplicatedRequestStatus = new RequestStatus(RequestStatus::REQUEST_STATUS_DUPLICATED);

        $manager->persist($newRequestStatus);
        $manager->persist($acceptedRequestStatus);
        $manager->persist($cancelledRequestStatus);
        $manager->persist($duplicatedRequestStatus);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }


}