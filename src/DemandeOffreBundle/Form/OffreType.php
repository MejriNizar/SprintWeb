<?php

namespace DemandeOffreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('budget')
            ->add('titre')
            ->add('description')
            # ->add('nbrVue')
            ->add('service',EntityType::class
                ,array('class'=>'ServiceBundle:service','choice_label'=>'nom','multiple'=>false),
                array('label' => 'form.offre', 'translation_domain' => 'ServiceBundle'))

        ->add('photo', FileType::class, [
                'data_class' => null,
                'multiple' => false,
                'attr'     => [
                    'accept' => 'image/*',
                ]])

         ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DemandeOffreBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'demandeoffrebundle_offre';
    }


}
