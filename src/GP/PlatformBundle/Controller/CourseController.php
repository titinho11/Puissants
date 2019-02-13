<?php

namespace GP\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GP\PlatformBundle\Entity\Classroom;
use GP\PlatformBundle\Entity\Course;
use GP\PlatformBundle\Form\CourseType;
use GP\PlatformBundle\Form\UpdateCourseType;

class CourseController extends Controller
{
    public function addCourseAction(Request $request, Classroom $classroom)
    {
      $course = new Course();
      $course->addClassroom($classroom); //

      $form   = $this->createForm(CourseType::class, $course);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($course);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Cours bien enregistrée.');

        return $this->redirectToRoute('gp_admin_homepage');
      }
      return $this->render('GPPlatformBundle:Course:addSector.html.twig', array(
        'form' => $form->createView()
      ));
    }

    public function updateCourseAction(Request $request, Course $course)
    {
      $form   = $this->createForm(UpdateCourseType::class, $course);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($course);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Cours bien modifié.');

        return $this->redirectToRoute('gp_admin_homepage');
      }
      return $this->render('GPPlatformBundle:Course:updateSector.html.twig', array(
        'form' => $form->createView()
      ));
    }

    // Récupère la liste de tous les Cours
    public function getCoursesAction(){
        $repository = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('GPPlatformBundle:Course')
        ;

        $listCourses = $repository->findAll();

        return $this->render('GPPlatformBundle:Course:getSectors.html.twig', array(
          'listCourses' => $listCourses
        ));

    }
}
