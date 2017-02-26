<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Association\ActiviteBundle\Entity\Activite;
use Association\ActiviteBundle\Entity\Visiteur;
use Association\ActiviteBundle\Form\ActiviteType;
use Association\ActiviteBundle\Form\VisiteurType;
use Association\ActiviteBundle\Form\MediaType;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends Controller {

    public function creerActiviteAction() {
        return $this->render('AssociationActiviteBundle::creerActivite.html.twig', array());
    }

    public function listeAction() {
        $em = $this->getDoctrine()->getmanager();
        $listeVisiteurs = $em->getRepository("AssociationActiviteBundle:Activite")->findAll();
        return $this->render('AssociationActiviteBundle::listeActivite.html.twig', array('listeActivites' => $listeVisiteurs));
    }

    public function ajouterAction() {
        $activite = new Activite();
        $formBuilder = $this->createFormBuilder($activite);
        $formBuilder->add('libele')
                ->add('description')
                ->add('date', 'date')
                ->add('lieu')
                ->add('heure')
                ->add('fiche', new MediaType());
        $form = $formBuilder->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
            return $this->redirect($this->generateUrl('association_activite_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Activites:ajouter.html.twig', array('form' => $form->createView(),));
    }

    public function ajouterVisiteurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $activite = $this->getDoctrine()
                ->getRepository("AssociationActiviteBundle:Activite")
                ->find($id);
        $visiteur = new Visiteur;
        $form = $this->createForm(new VisiteurType, $visiteur);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $activite->addVisiteur($visiteur);
            $em->flush();
            return $this->redirect($this->generateUrl('association_activite_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Visiteurs:ajouter.html.twig', array('form' => $form->createView(), 'id' => $id, 'libeleActivite' => $activite->getLibele(),));
    }

    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getmanager();
        $listeVisiteurs = $em->getRepository("AssociationActiviteBundle:Activite")->findAll();
        $dql = "SELECT a FROM AssociationActiviteBundle:Activite a ";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        return $this->render('AssociationActiviteBundle:Activites:listeActivite.html.twig', array('pagination' => $pagination, 'listeActivites' => $listeVisiteurs));
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $activite = $this->getDoctrine()
                ->getRepository("AssociationActiviteBundle:Activite")
                ->find($id);
        $em->remove($activite);
        $em->flush();
        return $this->redirect($this->generateUrl('association_activite_liste', array()));
    }

    public function editerAction($id) {
        $activite = $this->getDoctrine()
                ->getRepository("AssociationActiviteBundle:Activite")
                ->find($id);
        $formBuilder = $this->createFormBuilder($activite);
        $formBuilder->add('libele')
                ->add('description')
                ->add('date', 'date')
                ->add('lieu')
                ->add('heure');
        $form = $formBuilder->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
            return $this->redirect($this->generateUrl('association_activite_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:activites:ajouter.html.twig', array('form' => $form->createView(),));
    }

}

//  public function validerVisiteurAction() {
//        $visiteur = new Visiteur();
//        $session = $this->get('session');
//        $activite_id = $session->get('activite_id');
//        $activite = $this->getDoctrine()
//                ->getRepository("AssociationActiviteBundle:Activite")
//                ->find($activite_id);
//        $activite->addVisiteur($visiteur);
//        return $this->render('AssociationVisiteursBundle::ajouter.html.twig', array());
//    }
