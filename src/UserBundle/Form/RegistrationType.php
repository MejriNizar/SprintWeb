<?php
// src/AppBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;


class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('cin')
            ->add('email')
            ->add('password')
            ->add('adresse')
            ->add('num_tel')


            ->add('sexe',ChoiceType::class,array(
                'choices'=>array(
                    'Homme'=>'Homme',
                    'Femme'=>'Femme',

                )
            ))


            ->add('roles', CollectionType::class, array(
                'label' => 'Role',
                'entry_type' => ChoiceType::class,
                'entry_options' => array(
                    'label' => false,
                    'expanded' => false,
                    'choices' => array(
                        'Client' => 'ROLE_CLIENT',

                        'Admin' => 'ROLE_ADMIN',

                    ),
                    'data' => 'ROLE_CLIENT'
                )
            ))

            ->add('photo_profil', FileType::class, [
                'data_class' => null,
                'multiple' => false,
                'attr'     => [
                    'accept' => 'image/*',
                ]])


        ;


    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}