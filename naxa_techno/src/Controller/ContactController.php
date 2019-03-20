<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact;

        $form = $this->createForm(ContactType::class, $contact);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactForm = $form->getData();

            $serializer = new Serializer([new ObjectNormalizer()]);


            $contactFormData = $serializer->normalize($contactForm);
            var_dump($contactFormData);

            $message = (new \Swift_Message('You Got Mail!'))
                ->setFrom($contactFormData["email"])
                ->setTo('postmaster@localhost')
                ->setBody(
                    $contactFormData["message"],
                    'text/plain'
                );
            $mailer->send($message);

            return $this->redirectToRoute('contact');
        }

        return $this->render('/contact/index.html.twig', [
            'our_form' => $form->createView(),
        ]);
    }

    /**
     * Returns a JSON string with the sujets of the Contact with the providen id.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function listSujetsAction(Request $request)
    {
        // Get Entity manager and repository
        $em = $this->getDoctrine()->getManager();

        // Search the neighborhoods that belongs to the city with the given id as GET parameter "cityid"
        $sujets = $em->getRepository(Sujet::class)->findAll();

        // Serialize into an array the data that we need, in this case only name and id
        // Note: you can use a serializer as well, for explanation purposes, we'll do it manually
        $responseArray = array();
        foreach ($sujets as $sujet) {
            $responseArray[] = array(
                "id" => $sujet->getId(),
                "nom" => $sujet->getNom()
            );
        }

        // Return array with structure of the neighborhoods of the providen city id
        return new JsonResponse($responseArray);

        // e.g
        // [{"id":"3","name":"Treasure Island"},{"id":"4","name":"Presidio of San Francisco"}]
    }
}
