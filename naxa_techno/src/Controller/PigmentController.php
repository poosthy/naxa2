<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PigmentController extends AbstractController
{
    /**
     * @Route("/pigment", name="pigment")
     */
    public function index()
    {
        return $this->render('pigment/index.html.twig', [
            'controller_name' => 'PigmentController',
        ]);
    }
}
