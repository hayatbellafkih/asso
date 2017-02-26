<?php

namespace Association\ActiviteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChargeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOperation')
            ->add('valeur')
            ->add('description')
            ->add('commentaire')
            ->add('resteAPayer')
            ->add('dateLimiteRestAPayer')
            ->add('fournisseur', new FournisseurType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Association\ActiviteBundle\Entity\Charge'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'association_activitebundle_charge';
    }
}
