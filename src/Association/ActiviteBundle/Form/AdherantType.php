<?php

namespace Association\ActiviteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdherantType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom')
                ->add('prenom')
                ->add('dateAdhesion')
                ->add('dateExpiration')
                ->add('sexe')
                ->add('email')
                ->add('profil', 'choice', array('choices' => array('منخرط','
رئيس الجمعية                                                                   ', '
نائب رئيس الجمعية ', '
الكاتب العام', '
نائب الكاتب العام', '
مستشار', '
امين المال', '
امين الصندوق')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Association\ActiviteBundle\Entity\Adherant'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'association_activitebundle_adherant';
    }

}
