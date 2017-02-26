<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MailingController extends Controller {

    public function listeMailingAction() {
        $destinataires = $this->getDoctrine()->getManager()->getRepository("AssociationActiviteBundle:Adherant")->findAll();
        return $this->render('AssociationActiviteBundle::mailingListesPanel.html.twig', array('destinataires' => $destinataires));
    }
 public function listeMailingAdherantAction() {
        $destinataires = $this->getDoctrine()->getManager()->getRepository("AssociationActiviteBundle:Adherant")->findAll();
        return $this->render('AssociationActiviteBundle::mailingListe.html.twig', array('destinataires' => $destinataires));
    }
}
