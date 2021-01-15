<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;


class ProStagesController extends AbstractController
{
  /**
  * @Route("/", name="pro_stages-")
  */
  public function index()
  {
    $lsstages = $this->getDoctrine()->getRepository(Stage::class);
    $stages=$lsstages->findAllAvecNomEntreprise();


    return $this->render('pro_stages/index.html.twig', [ 'controller_name' => "ProStages",'stages'=> $stages, 'formation'=>"test", ]);
  }


  /**
  * @Route("/entreprises", name="pro_stages-entreprises")
  */
  public function afficherEntreprises()
  {
    $lsEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
    $entreprises=$lsEntreprise->findAll();
    return $this->render('pro_stages/affichageEntreprises.html.twig', ['entreprises'=> $entreprises]);
  }


  /**
  * @Route("/formations", name="pro_stages-formations")
  */
  public function afficherFormations()
  {
    $lsFormations = $this->getDoctrine()->getRepository(Formation::class);
    $formations=$lsFormations->findAll();
    return $this->render('pro_stages/affichageFormations.html.twig', [ 'formations'=>$formations]);
  }



  /**
  * @Route("/stages/{id}", name="pro_stages-stages")
  */
  public function afficherStages($id)
  {
    $lsstages = $this->getDoctrine()->getRepository(Stage::class);
    $stages=$lsstages->findByIdStage($id);
    return $this->render('pro_stages/affichageStages.html.twig', ['stage' =>$stages]);
  }


}
