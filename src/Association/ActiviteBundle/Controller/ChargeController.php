<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Association\ActiviteBundle\Form\ChargeType;
use Association\ActiviteBundle\Entity\Charge;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ChargeController extends Controller {

    public function ajouterAction() {
        $em = $this->getDoctrine()->getManager();
        $categoriesFournisseurs = array('اخرى', 'النسخ', 'الفنادق', 'مواد غذائية');
        $nomsFournisseur = $em->getRepository('AssociationActiviteBundle:Fournisseur')->findAll();
        $charge = new Charge();
        $form = $this->createForm(new ChargeType(), $charge);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em->persist($charge);
            $em->flush();
            return $this->redirect($this->generateUrl('association_charge_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Charges:ajouterCharge.html.twig', array('form' => $form->createView(), 'nomsFournisseur' => $nomsFournisseur, 'categoriesFournisseurs' => $categoriesFournisseurs));
    }

    public function listeAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $dql = "select c from AssociationActiviteBundle:Charge c";
        $query = $em->createQuery($dql);
        $listeCharges = $this->get('knp_paginator');
        $listeCharges = $listeCharges->paginate($query, $request->query->get('page', 1, 10));
        return $this->render('AssociationActiviteBundle:Charges:listeCharge.html.twig', array('listecharges' => $listeCharges));
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $charge = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Charge')->find($id);
        $em->remove($charge);
        $em->flush();
        return $this->redirect($this->generateUrl('association_charge_liste', array()));
    }

    public function editerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $charge = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Charge')->find($id);
        $form = $this->createForm(new ChargeType(), $charge);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em->persist($charge);
            $em->flush();
            return $this->redirect($this->generateUrl('association_charge_liste', array()));
        }
        return $this->render('AssociationActiviteBundle:Charges:editerCharge.html.twig', array('form' => $form->createView(), 'id' => $id));
    }

    public function loadFournisseursAction() {
        $request = $this->getRequest();
        $response = new JsonResponse();
        $categorie = $request->get('categorie');
        $em = $this->getDoctrine()->getManager();
        $nomsFournisseur = $em->getRepository('AssociationActiviteBundle:Fournisseur')->findBy(array('categorie' => $categorie));
        return $response->setData(array('noms' => $nomsFournisseur));
    }

}
