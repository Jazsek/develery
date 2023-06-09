<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/', name: 'app_contact')]
    public function index(Request $request, ContactRepository $contacts): Response
    {
        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
            ->add('name')
            ->add('email')
            ->add('message')
            ->add('submit', SubmitType::class, ['label' => 'Mentés'])
            ->getForm();

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

        /* return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]); */
    }
}
