<?php

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ConfigController extends Controller {

    public function indexAction() {
        $config = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Options')->findBy(array('nomOption' => 'typer'));
        $liste = explode(';', $config[0]->getValeurOption());
        return $this->render('AssociationActiviteBundle:Configurations:configuration.html.twig', array('types' => $liste));
    }

    public function AjoutTypeAction($type) {
        $em = $this->getDoctrine()->getManager();
        $response = new JsonResponse();
        $config = $this->getDoctrine()->getRepository('AssociationActiviteBundle:Options')->findBy(array('nomOption' => 'typer'));
        $liste = explode(';', $config[0]->getValeurOption());
        $liste[] = $type;
        $l = implode(';', $liste);
        $config[0]->setValeurOption($l);
        $em->persist($config[0]);
        $em->flush();
        return $response->setData(array('type' => $type));
    }

}
