<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdditifController extends AbstractController
{
    /**
     * @Route("/additif", name="additif")
     */
    public function index()
    {
        return $this->render('additif/index.html.twig', [
            'controller_name' => 'AdditifController',
        ]);
    }
}
