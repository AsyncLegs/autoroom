<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class VehiclePartsRequestForm extends BaseRequestsForm
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('customerEmail', EmailType::class)
            ->add('carBrand', TextType::class)
            ->add('carModel', TextType::class)
            ->add('vinCode', TextType::class)
            ->add('parts', TextareaType::class)
            ->add('carReleaseYear', TextType::class);
    }
}
