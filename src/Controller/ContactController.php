<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/', name: 'app_contact')]
    public function index(Request $request, ContactRepository $contacts): Response
    {
        $form = $this->createForm(ContactType::class, new Contact());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $contacts->save($contact, true);

            $this->addFlash('success', 'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');

            return $this->redirectToRoute('app_contact');
        }

        return $this->renderForm(
            'contact/index.html.twig', 
            [
                'form' => $form
            ]
        );
    }
}
