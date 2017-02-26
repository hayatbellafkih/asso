<?php

namespace Association\ActiviteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Association\ActiviteBundle\Form\MediaType;

class ReunionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
//         $config = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Options')->findBy(array('nomOption' => 'typer'));
//        $liste = explode(';', $config[0]->getValeurOption());
        $builder
                ->add('type', 'choice', array('choices' => array("F", "H")))
                ->add('date')
                ->add('heure')
                ->add('programme')
                ->add('urlPvReunion')
                ->add('pv', new MediaType())

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Association\ActiviteBundle\Entity\Reunion'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'association_activitebundle_reunion';
    }

}
