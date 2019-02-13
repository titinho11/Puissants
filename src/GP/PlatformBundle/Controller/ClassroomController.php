<?php

namespace GP\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GP\PlatformBundle\Entity\Classroom;
use GP\PlatformBundle\Entity\Semester;

use GP\PlatformBundle\Form\ClassroomType;
use GP\PlatformBundle\Form\UpdateClassroomType;

class ClassroomController extends Controller
{
    public function addClassroomAction(Request $request)
    {
      $classroom = new Classroom();

      $form = $this->createForm(ClassroomType::class, $classroom);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($classroom);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Classroom added.');

        return $this->redirectToRoute('gp_admin_homepage');
      }

      return $this->render('GPPlatformBundle:Classroom:addClassroom.html.twig', array(
        'form' => $form->createView()
      ));
    }

    public function updateClassroomAction(Request $request, Classroom $classroom)
    {
      $form = $this->createForm(UpdateClassroomType::class, $classroom);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($classroom);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Classroom updated.');

        return $this->redirectToRoute('gp_admin_homepage');
      }

      return $this->render('GPPlatformBundle:Classroom:updateClassroom.html.twig', array(
        'form' => $form->createView()
      ));
    }

    // Récupère laliste de toutes les classes dans l'ordre décroissante de création
    public function getClassroomsAction(){
      $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('GPPlatformBundle:Classroom')
      ;

      $listClassrooms = $repository->findAll();

      return $this->render('GPPlatformBundle:Classroom:getClassrooms.html.twig', array(
        'listClassrooms' => $listClassrooms
      ));
    }
}
