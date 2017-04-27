<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndBundle:Default:index.html.twig');
    }

    public function serveisAction() {
        return $this->render('FrontEndBundle:Default:serveis.html.twig');
    }

    public function contacteAction() {
        return $this->render('FrontEndBundle:Default:contacte.html.twig');
    }

}