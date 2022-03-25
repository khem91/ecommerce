<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Services\Mail\SendPreparedMail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(SendPreparedMail $sendPreparedMail,Request $request)
        {
            $form = $this->createForm(ContactType::class);
    
            $form->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid())
            {
                $email = $form->get('email')->getData();
                $name = $form->get('name')->getData();
                $contentMessage = $form->get('contentMessage')->getData();
                $subjectMessage = $form->get('subjectMessage')->getData();
    
                $sendPreparedMail->sendMailToContact($email,$name,$contentMessage,$subjectMessage);

                $this->addFlash("success","Le mail a bien été envoyé");
                return $this->redirectToRoute("contact");
            }
        return $this->render('customer/contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
