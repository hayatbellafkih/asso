<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Association\ActiviteBundle\Entity\Visiteur;
use Symfony\Component\HttpFoundation\Response;

class VisiteursController extends Controller {

    protected $message;

    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getmanager();
        $dql = "SELECT v FROM AssociationActiviteBundle:Visiteur v ";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $listeVisiteurs = $paginator->paginate(
                $query, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        // parameters to template
        return $this->render('AssociationActiviteBundle:Visiteurs:listeVisiteur.html.twig', array('listeVisiteurs' => $listeVisiteurs));
    }

    public function addAction() {
        $this->message = "لقد تمت اضافة الزائر بنجاح";
        if (!empty($_POST['action_visiteurs'])) {
            if ($_POST['action_visiteurs'] == 'add') {
                $visiteur = new Visiteur();
                $visiteur->setNom('hayat');
                $visiteur->setPrenom('bellafkih');
                $visiteur->setEmail('email');
                $visiteur->setAdresse('adresse');
                $visiteur->setTel('tel');
                $visiteur->setSexe('sexe');
                $visiteur->setCivilite('civilite');
                $visiteur->setOcupation('ocupation');
                $em = $this->getDoctrine()->getManager();
                $em->persist($visiteur);
                $em->flush();
                return $this->render('AssociationActiviteBundle:Visiteurs:ajouter.html.twig', array('message' => $this->message));
            }
            if ($_POST['action_visiteurs'] == 'cancel') {
                return $this->render('AssociationActiviteBundle:Visiteurs:ajouter.html.twig', array());
            } else {
                return new Response('l');
            }
        }
    }

    public function editAction() {
        return $this->render('AssociationActiviteBundle:Visiteurs:ajouter.html.twig', array());
    }

    public function validateEditAction() {
        return new Response($_POST['nom']);
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $visiteur = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Visiteur')->find($id);
        $em->remove($visiteur);
        $em->flush();
        return $this->redirect($this->generateUrl('liste_visiteur'));
    }

    public function editerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $visiteur = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Visiteur')->find($id);
        $form = $this->createForm(new \Association\ActiviteBundle\Form\VisiteurType(), $visiteur);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em->persist($visiteur);
            $em->flush();
            return $this->redirect($this->generateUrl('liste_visiteur'));
        }
        return $this->render('AssociationActiviteBundle:Visiteurs:editer.html.twig', array('form' => $form->createView(), 'id' =>$id));
    }

}
