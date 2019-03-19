<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NanomateriauxController extends AbstractController
{
    /**
     * @Route("/nanomateriaux", name="nanomateriaux")
     */
    public function index()
    {
        return $this->render('nanomateriaux/index.html.twig', [
            'controller_name' => 'NanomateriauxController',
        ]);
    }
}
