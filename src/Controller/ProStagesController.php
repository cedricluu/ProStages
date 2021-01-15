<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStagesController extends AbstractController
{
  /**
  * @Route("/", name="pro_stages-")
  */
  public function index()
  {
    return $this->render('pro_stages/index.html.twig', [ 'controller_name' => "ProStages", ]);
  }


  /**
  * @Route("/entreprises", name="pro_stages-entreprises")
  */
  public function afficherEntreprises()
  {
    return $this->render('pro_stages/affichageEntreprises.html.twig');
  }


  /**
  * @Route("/formations", name="pro_stages-formations")
  */
  public function afficherFormations()
  {
    return $this->render('pro_stages/affichageFormations.html.twig');
  }



  /**
  * @Route("/stages", name="pro_stages-stages")
  */
  public function afficherStages()
  {
    return $this->render('pro_stages/affichageStages.html.twig', ['idStage' =>21]);
  }


}
