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
        return $this->render('pro_stages/index.html.twig');
    }


        /**
         * @Route("/entreprises", name="pro_stages-entreprises")
         */
        public function afficherEntreprises()
        {
            return $this->render('pro_stages/affichageEntreprises.html.twig');
        }


}
