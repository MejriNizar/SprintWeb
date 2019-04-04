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
            ->add('nom')
            ->add('prenom')
            ->add('tel')
            ->add('date_nais', null ,array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-200),
            ))
            ->add('roles', CollectionType::class, array(
                'label' => 'Role',
                'entry_type' => ChoiceType::class,
                'entry_options' => array(
                    'label' => false,
                    'expanded' => false,
                    'choices' => array(
                        'Voyageur' => 'ROLE_CLIENT',
                        'Organisateur' => 'ROLE_ORGANISATEUR',
                        'Guide' => 'ROLE_GUIDE',
                        'Famille' => 'ROLE_FAMILLE'
                    ),
                    'data' => 'ROLE_VOYAGEUR'
                )
            ))
            ->add('type',
                ChoiceType::class, array(
                    'choices'  => array(
                        'Agence' => 'Agence',
                        'Club' => 'Club'

                    ),
                    'data' => 'Voyage'
                ))
            ->add ('description')
            ->add ('adresse')
            ->add('pays')
            ->add('preference',ChoiceType::class,array(
                'choices'=>array(
                    'Voyage'=>'Voyages',
                    'Randonée'=>'Randonée',
                    'Camping'=>'Camping',
                    'Excursion'=>'Excursion',
                )
            ))
            ->add('nationalite')
            ->add('secteur')
            ->add('experience')
            ->add('secourisme',CheckboxType::class,array('required' => false))
            ->add('secteur')
            ->add('dispo',null ,array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')+10),
            ))
            ->add('site_web')
            ->add('nom_organisation')
            ->add('photo', FileType::class, [
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