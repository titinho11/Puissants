<?php

namespace GP\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GP\PlatformBundle\Entity\Message;

use GP\PlatformBundle\Form\MessageType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('GPPlatformBundle:Default:index.html.twig');
    }

    public function contactAction(Request $request)
    {
        $msg = new Message();

        $form = $this->createForm(MessageType::class, $msg);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($msg);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Thank you for your message, we will get back to you shortly.');

          return $this->redirectToRoute('gp_platform_homepage');
        }

        return $this->render('GPPlatformBundle:Default:contact.html.twig', array(
          'form' => $form->createView()
        ));
    }
}
