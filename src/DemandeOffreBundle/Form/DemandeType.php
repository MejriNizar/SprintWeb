<?php

namespace DemandeOffreBundle\Form;

use DemandeOffreBundle\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('budget')
            ->add('dateFin',null ,array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')+10),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),
            ))

            ->add('description');

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DemandeOffreBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'demandeoffrebundle_demande';
    }


}
