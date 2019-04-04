<?php

namespace DemandeOffreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DemandeOffreBundle:Default:index.html.twig');
    }
}
