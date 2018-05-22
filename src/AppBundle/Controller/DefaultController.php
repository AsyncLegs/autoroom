<?php

namespace AppBundle\Controller;

use AppBundle\Controller\Base\BaseController;
use AppBundle\Form\CallbackRequestForm;
use AppBundle\Form\MaintenanceRequestForm;
use AppBundle\Form\VehiclePartsRequestForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $callbackRequestForm = $this->createForm(CallbackRequestForm::class);
        $callbackRequestFormBottom = $this->createForm(CallbackRequestForm::class);
        $maintenanceRequestForm = $this->createForm(MaintenanceRequestForm::class);
        $maintenanceRequestFormBottom = $this->createForm(MaintenanceRequestForm::class);
        $vehiclePartsRequestForm = $this->createForm(VehiclePartsRequestForm::class);
        $vehiclePartsRequestFormBottom = $this->createForm(VehiclePartsRequestForm::class);


        $services = [
            ['img' => '/images/services/1.png', 'description' => 'Капремонт двигателей (бензин, дизель)'],
            ['img' => '/images/services/2.png', 'description' => 'Капремонт АКПП, МКПП'],
            ['img' => '/images/services/3.png', 'description' => 'Ремонт ходовой'],
            ['img' => '/images/services/4.png', 'description' => 'Ремонт рулевого управления'],
            ['img' => '/images/services/5.png', 'description' => 'Регламентное ТО'],
            ['img' => '/images/services/6.png', 'description' => 'Сварочные работы'],
            ['img' => '/images/services/7.png', 'description' => 'Ремонт тормозных систем'],
            ['img' => '/images/services/8.png', 'description' => 'Ремонт выхлопных систем'],
            ['img' => '/images/services/9.png', 'description' => 'Антибак- териальная обработка салона'],
            ['img' => '/images/services/10.png', 'description' => 'Замена технических жидкостей'],
            ['img' => '/images/services/11.png', 'description' => 'Аргонно- дуговая сварка'],
            ['img' => '/images/services/12.png', 'description' => 'Компьютерная диагностика'],
            ['img' => '/images/services/13.png', 'description' => 'Ремонт електро- оборудования'],
            ['img' => '/images/services/14.png', 'description' => 'Ремонт генераторов стартеров'],
            [
                'img' => '/images/services/15.png',
                'description' => 'Диагностика,<br/> ремонт,<br/> чистка систем впрыска',
            ],
            ['img' => '/images/services/16.png', 'description' => 'Установка дополни- тельного оборудования'],
            ['img' => '/images/services/17.png', 'description' => 'Ремонт систем отопления'],
            ['img' => '/images/services/18.png', 'description' => 'Ремонт и заправка автоконди- ционеров'],
        ];
        $whywe = [
            ['img' => '/images/im_1.png', 'text' => 'Скорость<br/> работы'],
            ['img' => '/images/im_2.png', 'text' => 'Гарантированное<br/> качество'],
            ['img' => '/images/im_3.png', 'text' => 'Квалифицированный<br/> персонал'],
            ['img' => '/images/im_4.png', 'text' => 'Адекватные<br/> цены'],
            ['img' => '/images/im_5.png', 'text' => 'Нас<br/> рекомендуют'],
            ['img' => '/images/im_6.png', 'text' => 'У нас<br/> есть кофе ;)'],
        ];
        $owners = [
            ['img' => '/images/user.png', 'name' => 'Дмитрий', 'mobile' => '097-559-78-23'],
            ['img' => '/images/user.png', 'name' => 'Марина', 'mobile' => '067-468-48-98'],
            ['img' => '/images/user.png', 'name' => 'Виталий', 'mobile' => '067-225-80-90'],
        ];

        return $this->render(
            '@App/index.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
                'owners' => $owners,
                'whywe' => $whywe,
                'services' => $services,
                'callbackRequestForm' => $callbackRequestForm->createView(),
                'callbackRequestFormBottom' => $callbackRequestFormBottom->createView(),
                'maintenanceRequestForm' => $maintenanceRequestForm->createView(),
                'maintenanceRequestFormBottom' => $maintenanceRequestFormBottom->createView(),
                'vehiclePartsRequestForm' => $vehiclePartsRequestForm->createView(),
                'vehiclePartsRequestFormBottom' => $vehiclePartsRequestFormBottom->createView(),
            ]
        );
    }
}
