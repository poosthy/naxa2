<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecteurController extends AbstractController
{
    /**
     * @Route("/secteur", name="secteur")
     */
    public function index()
    {
        return $this->render('secteur/index.html.twig', [
            'controller_name' => 'SecteurController',
        ]);
    }
}
