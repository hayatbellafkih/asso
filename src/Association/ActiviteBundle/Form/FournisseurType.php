<?php

namespace Association\ActiviteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FournisseurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text',array('label' => 'الاسم', 'attr' => array('class' => 'text')))
            ->add('adresse', 'textarea',array('label' => 'العنوان', 'attr' => array('class' => 'text')))
            ->add('tel', 'text',array('label' => 'الهاتف', 'attr' => array('class' => 'text')))
            ->add('categorie', 'choice',array('label' => 'التصنيف', 'choices' => array('kkk', 'hhi')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Association\ActiviteBundle\Entity\Fournisseur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'association_activitebundle_fournisseur';
    }
}
