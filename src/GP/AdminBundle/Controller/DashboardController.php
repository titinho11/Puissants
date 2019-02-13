<?php

namespace GP\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GP\PlatformBundle\Entity\Message;

class DashboardController extends Controller
{
    public function dashboardAction()
    {
      // Récupère la liste des messages
      $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('GPPlatformBundle:Message')
      ;

      $listmessages = $repository->findAll();

      return $this->render('GPAdminBundle:Dashboard:dashboard.html.twig', array(
        'listmessages' => $listmessages
      ));

    }


}
