<?php

namespace GP\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GPAdminBundle:Default:index.html.twig');
    }
}
