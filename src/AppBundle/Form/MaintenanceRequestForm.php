<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class MaintenanceRequestForm extends BaseRequestsForm
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add(
                'visitDate',
                DateType::class,
                [
                    'format' => 'dd-MM-yyyy',
                    'widget' => 'single_text',
                ]
            );
    }
}
