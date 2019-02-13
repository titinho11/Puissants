<?php

namespace GP\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GP\PlatformBundle\Entity\Semester;

use GP\PlatformBundle\Form\SemesterType;
use GP\PlatformBundle\Form\UpdateSemesterType;

class SemesterController extends Controller
{
    public function addSemesterAction(Request $request)
    {
      $semester = new Semester();
      $form   = $this->get('form.factory')->create(SemesterType::class, $semester);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($semester);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Semestre été créé avec succès.');

          return $this->redirectToRoute('gp_admin_homepage');
      }

      return $this->render('GPPlatformBundle:Semester:addSemester.html.twig', array(
        'form' => $form->createView()
      ));
    }

    public function updateSemesterAction(Request $request, Semester $semester)
    {
      $form = $this->createForm(UpdateSemesterType::class, $semester);
      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($semester);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Le Semestre a été modifié avec succès.');

        return $this->redirectToRoute('gp_admin_homepage');
      }

      return $this->render('GPPlatformBundle:Semester:updateSemester.html.twig', array(
        'form' => $form->createView()
      ));
    }

    //récupère la liste de tous les semestres du plus récent au plus ancien
    public function getSemestersAction(){
      $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('GPPlatformBundle:Semester')
      ;

      $listSemesters = $repository->findAll();

      return $this->render('GPPlatformBundle:Semester:getSemesters.html.twig', array(
        'listSemesters' => $listSemesters
      ));
    }
}
