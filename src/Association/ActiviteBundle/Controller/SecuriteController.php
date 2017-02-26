<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Association\ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @author hazem
 */
class SecuriteController extends Controller {

    /**
     * Afficher le formulaire d'authentification
     * @Route("/login/", name="login")
     * @Template()
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     */
    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        if ($error)
            $errorMessage = $error->getMessage();
        else
            $errorMessage = '';
        return array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error_message' => $errorMessage,
        );
    }

    /**
     * Action pour recevoir les informations envoyées
     * @Route("/login_check/", name="login_check")
     * @author hazem
     * @return \Symfony\Bundle\FrameworkBundle\Controller\RedirectResponse
     */
    public function checkAction(Request $request) {
        return new Response();
    }

    /**
     * Deconnexion d'un utilisateur
     * @Route("/logout/", name="logout")
     * @author hazem
     * @return \Symfony\Bundle\FrameworkBundle\Controller\RedirectResponse
     */
    public function logoutAction() {
        $session = $this->getRequest()->getSession();
        $token = $session->get('token');

        $this->get("request")->getSession()->invalidate();

        $this->get("security.context")->setToken(null);

        $this->getRequest()->getSession()->remove('token');

        return $this->redirect($this->generateUrl('acceuil'));
    }

    /**
     * redirection (selon le rôle) après une authentification avec succès
     * @Route("/redirection/", name="redirection")
     * @author hazem
     * @return \Symfony\Bundle\FrameworkBundle\Controller\RedirectResponse
     */
    public function redirectionAction() {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('admin_acceuil'));

        elseif ($this->get('security.context')->isGranted('ROLE_CLIENT'))
            return $this->redirect($this->generateUrl('client_acceuil'));
    }

}
