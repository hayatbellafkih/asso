<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Association\ActiviteBundle\Entity\Adherant;
use Association\ActiviteBundle\Form\AdherantType;
use Symfony\Component\HttpFoundation\Response;

class AdherantController extends Controller {

    public function listeAction(Request $request) {
        $em = $this->getDoctrine()->getmanager();
        $dql = "SELECT a FROM AssociationActiviteBundle:Adherant a ";
        $query = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $listeAdherants = $paginator->paginate(
                $query, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        return $this->render('AssociationActiviteBundle:Adherants:listeAdherants.html.twig', array('adhearnts' => $listeAdherants));
    }

    public function ajouterAction() {
        $adherant = new adherant();
        $form = $this->createForm(new AdherantType(), $adherant);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $dt = new \DateTime($adherant->getDateAdhesion()->format('Y-m-d'));
            $a = $dt->modify('+1 years');
            $adherant->setDateExpiration($a);
            $em->persist($adherant);
            $em->flush();
            return $this->redirect($this->generateUrl('association_adherant_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Adherants:ajouterAdherant.html.twig', array('form' => $form->createView()));
    }

    public function ficheAdherantAction($id) {
        $adherant = $this->getDoctrine()->getRepository("AssociationActiviteBundle:Adherant")->find($id);
        return $this->render('AssociationActiviteBundle:Adherants:ficheAdherant.html.twig', array('adherant' => $adherant));
    }

    public function supprimerAction($id) {

        $adherant = $this->getDoctrine()->getRepository("AssociationActiviteBundle:Adherant")->find($id);
        $this->getDoctrine()->getManager()->remove($adherant);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirect($this->generateUrl('association_adherant_liste', array()));
    }

    public function editerAction($id) {
        $adherant = $this->getDoctrine()->getRepository("AssociationActiviteBundle:Adherant")->find($id);
        $form = $this->createForm(new AdherantType(), $adherant);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($adherant);
            $em->flush();
            return $this->redirect($this->generateUrl('association_adherant_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Adherants:ajouterAdherant.html.twig', array('form' => $form->createView()));
    }

}
