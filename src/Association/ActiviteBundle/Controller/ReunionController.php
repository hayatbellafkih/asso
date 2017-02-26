<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Association\ActiviteBundle\Form\ReunionType;
use Association\ActiviteBundle\Entity\Reunion;
use Symfony\Component\HttpFoundation\Request;

class ReunionController extends Controller {

    public function ajouterAction() {
        $em = $this->getDoctrine()->getManager();
        $reunion = new Reunion();
        $form = $this->createForm(new ReunionType(), $reunion);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em->persist($reunion);
            $em->flush();
                    return $this->redirect($this->generateUrl('association_reunion_liste', array()));

        }
        return $this->render('AssociationActiviteBundle:Reunions:ajouterReunion.html.twig', array('form' => $form->createView()));
    }

    public function listeAction(Request $request) {
        $em = $this->getDoctrine()->getmanager();
        $dql = "SELECT a FROM AssociationActiviteBundle:Reunion a ";
        $query = $em->createQuery($dql);
        $listeReunion = $this->get('knp_paginator');
        $listeReunion = $listeReunion->paginate(
                $query, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        return $this->render('AssociationActiviteBundle:Reunions:listeReunions.html.twig', array('listereunions' => $listeReunion));
    }

    public function editerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $reunion = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Reunion')->find($id);
        $form = $this->createForm(new ReunionType(), $reunion);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em->persist($reunion);
            $em->flush();
            return $this->redirect($this->generateUrl('association_reunion_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Reunions:ajouterReunion.html.twig', array('form' => $form->createView()));
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $reunion = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Reunion')->find($id);
        $em->remove($reunion);
        $em->flush();
        return $this->redirect($this->generateUrl('association_reunion_liste', array()));
    }

}
