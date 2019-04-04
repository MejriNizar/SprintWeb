<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{

    /**
     * @Route("/admin/home")
     */
    public function redirectAction()
    {
        $authCheker = $this->container->get('security.authorization_checker');
        if ($authCheker->isGranted('ROLE_ADMIN'))
        {
            return $this->render('@User/Security/admin_home.html.twig');
        } else
            if ($authCheker->isGranted('ROLE_VOYAGEUR'))
            {
                return $this->redirectToRoute('voyageur_home');
            } else
                if ($authCheker->isGranted('ROLE_GUIDE'))
                {
                    return $this->redirectToRoute('guide_home');
                }
                else
                    if ($authCheker->isGranted('ROLE_ORGANISATEUR'))
                        {
                            return $this->redirectToRoute('organisateur_home');
                        }
                    else
                        if ($authCheker->isGranted('ROLE_FAMILLE'))
                        {
                            return $this->redirectToRoute('famille_home');
                        }
    }


    /**
     * @Route("/voyageur/home")
     */

    public function redirectvoyageurAction()
    {
        $authCheker= $this->container->get('security.authorization_checker');
        if ($authCheker->isGranted('ROLE_VOYAGEUR')) {
            return $this->render('@User/Security/voyageur_home.html.twig');
        }

    }
    /**
     * @Route("/guide/home")
     */

    public function redirectguideAction()
    {
        $authCheker= $this->container->get('security.authorization_checker');
        if ($authCheker->isGranted('ROLE_GUIDE')) {
            return $this->render('@User/Security/guide_home.html.twig');
        }

    }


    /**
     * @Route("/famille/home")
     */

    public function redirectfamilleAction()
    {
        $authCheker= $this->container->get('security.authorization_checker');
        if ($authCheker->isGranted('ROLE_FAMILLE')) {
            return $this->render('@User/Security/famille_home.html.twig');
        }

    }


    /**
     * @Route("/organisateur/home")
     */

    public function redirectorganisateurAction()
    {
        $authCheker= $this->container->get('security.authorization_checker');
        if ($authCheker->isGranted('ROLE_ORGANISATEUR')) {
            return $this->render('@User/Security/organisateur_home.html.twig');
        }

    }




}
