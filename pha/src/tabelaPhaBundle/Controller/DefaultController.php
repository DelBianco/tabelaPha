<?php

namespace tabelaPhaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('tabelaPhaBundle:Default:index.html.twig');
    }
}
