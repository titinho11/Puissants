<?php

namespace GP\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GP\PlatformBundle\Entity\Classroom;
use GP\PlatformBundle\Entity\Sector;
use GP\PlatformBundle\Form\SectorType;
use GP\PlatformBundle\Form\UpdateSectorType;

class SectorController extends Controller
{
    public function addSectorAction(Request $request)
    {
      $course = new Sector();

      $form   = $this->createForm(SectorType::class, $course);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($course);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Departement bien enregistré.');

        return $this->redirectToRoute('gp_admin_homepage');
      }
      return $this->render('GPPlatformBundle:Sector:addSector.html.twig', array(
        'form' => $form->createView()
      ));
    }

    public function updateSectorAction(Request $request, Sector $course)
    {
      $form   = $this->createForm(UpdateSectorType::class, $course);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($course);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Departement bien modifié.');

        return $this->redirectToRoute('gp_admin_homepage');
      }
      return $this->render('GPPlatformBundle:Sector:updateSector.html.twig', array(
        'form' => $form->createView()
      ));
    }

    // Récupère la liste de tous les Cours
    public function getSectorsAction(){
        $repository = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('GPPlatformBundle:Sector')
        ;

        $listCourses = $repository->findAll();

        return $this->render('GPPlatformBundle:Sector:getSectors.html.twig', array(
          'listSectors' => $listCourses
        ));

    }
}
