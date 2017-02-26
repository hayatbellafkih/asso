<?php

namespace Association\ActiviteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AssociationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('pathLogo','file')
            ->add('local')
            ->add('adresse')
            ->add('telUn')
            ->add('telDeux')
            ->add('telTrois')
            ->add('pays')
            ->add('ville')
            ->add('site')
            ->add('fax')
            ->add('emailUn')
            ->add('emailDeux')
            ->add('facebook')
            ->add('twiter')
            ->add('youtube')
            ->add('nom')
            ->add('dateCreation')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Association\ActiviteBundle\Entity\Association'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'association_activitebundle_association';
    }
}
