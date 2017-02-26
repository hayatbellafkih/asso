<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Association\ActiviteBundle\Form\AssociationType;
use Association\ActiviteBundle\Entity\Association;

class GeneralController extends Controller {

    public function indexAction() {
        return $this->render('AssociationActiviteBundle::index.html.twig', array());
    }

    public function editerficheAssociationAction() {
        $asso = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Association')->findAll();
        if (count($asso) < 1) {
            $association = new Association();
        } else {
            $association = $asso[0];
            $association->setPathLogo('coc');
        }
        $form = $this->createForm(new AssociationType, $association);
        $request = $this->get('Request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($association);
            $em->flush();
            return $this->redirect($this->generateUrl('association_manager_homepage'));
        }
        return $this->render('AssociationActiviteBundle::editerficheAssociation.html.twig', array('form' => $form->createView(),));
    }

    public function ficheAssociationAction() {
        $asso = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Association')->find(1);
        return $this->render('AssociationActiviteBundle::ficheAssociation.html.twig', array('association' => $asso));
    }

}
