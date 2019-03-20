<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Additif;

class AdditifController extends AbstractController
{
    /**
     * @Route("/additif", name="additif")
     */
    public function index()
    {
        $types = array('Thermoplastiques', 'Peintures');

        $additifs = $this->getDoctrine()->getRepository(Additif::class)->findAll();
        return $this->render('additif/index.html.twig', [
            'types' => $types,
            'additifs' => $additifs
        ]);
    }
}
