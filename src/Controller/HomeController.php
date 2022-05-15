<?php

namespace App\Controller;

use App\Form\DevisType;
use App\Form\GeneralType;
use App\Form\LogoType;
use App\Form\PubliciteType;
use App\Form\SiteWebType;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public $entityManager;

    public function __constructor(EntityManager $entityManager){
        $this->entityManager = $entityManager;
    }


    #[Route('', name: 'app_home')]
    public function index(MailerInterface $mailer, Request $request): Response
    {
        $generalForm = $this->createForm(GeneralType::class);
        $generalForm->handleRequest($request);

        if ($generalForm->isSubmitted() && $generalForm->isValid()) {
            $email = (new TemplatedEmail())
                ->from($generalForm['email']->getData())
                ->to((new Address('vivien.joly@hotmail.fr')))
                ->subject($generalForm['sujet']->getData())
                ->context([
                    'firstName' => $generalForm['firstName']->getData(),
                    'name' => $generalForm['name']->getData(),
                    'business' => $generalForm['business']->getData(),
                    'mail' => $generalForm['email']->getData(),
                    'telephone' => $generalForm['telephone']->getData(),
                    'sujet' => $generalForm['sujet']->getData(),
                    'contenu' => $generalForm['contenu']->getData(),
                ])
                ->htmlTemplate('formulaire/general.html.twig');
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé !');

            $emailRep = (new TemplatedEmail())
                ->from((new Address('com25agence@gmail.com', 'Com25')))
                ->to($generalForm['email']->getData())
                ->subject('Message bien reçu')
                ->context([
                    'firstName' => $generalForm['firstName']->getData(),
                    'name' => $generalForm['name']->getData(),
                ])
                ->htmlTemplate('formulaire/reponse.html.twig');
            $mailer->send($emailRep);
        }

        $devisForm = $this->createForm(DevisType::class);
        $devisForm->handleRequest($request);

        if ($devisForm->isSubmitted() && $devisForm->isValid()) {
            $email = (new TemplatedEmail())
                ->from($devisForm['email']->getData())
                ->to((new Address('vivien.joly@hotmail.fr')))
                ->subject($devisForm['sujet']->getData())
                ->context([
                    'firstName' => $devisForm['firstName']->getData(),
                    'name' => $devisForm['name']->getData(),
                    'business' => $devisForm['business']->getData(),
                    'mail' => $devisForm['email']->getData(),
                    'telephone' => $devisForm['telephone']->getData(),
                    'sujet' => $devisForm['sujet']->getData(),
                    'contenu' => $devisForm['contenu']->getData(),
                ])
                ->htmlTemplate('formulaire/general.html.twig');
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé !');

            $emailRep = (new TemplatedEmail())
                ->from((new Address('com25agence@gmail.com', 'Com25')))
                ->to($devisForm['email']->getData())
                ->subject('Message bien reçu')
                ->context([
                    'firstName' => $devisForm['firstName']->getData(),
                    'name' => $devisForm['name']->getData(),
                ])
                ->htmlTemplate('formulaire/reponse.html.twig');
            $mailer->send($emailRep);
        }

        $webForm = $this->createForm(SiteWebType::class);
        $webForm->handleRequest($request);

        if ($webForm->isSubmitted() && $webForm->isValid()) {
            $email = (new TemplatedEmail())
                ->from($webForm['email']->getData())
                ->to((new Address('vivien.joly@hotmail.fr')))
                ->subject($webForm['sujet']->getData())
                ->context([
                    'firstName' => $webForm['firstName']->getData(),
                    'name' => $webForm['name']->getData(),
                    'business' => $webForm['business']->getData(),
                    'mail' => $webForm['email']->getData(),
                    'telephone' => $webForm['telephone']->getData(),
                    'sujet' => $webForm['sujet']->getData(),
                    'contenu' => $webForm['contenu']->getData(),
                ])
                ->htmlTemplate('formulaire/general.html.twig');
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé !');

            $emailRep = (new TemplatedEmail())
                ->from((new Address('com25agence@gmail.com', 'Com25')))
                ->to($webForm['email']->getData())
                ->subject('Message bien reçu')
                ->context([
                    'firstName' => $webForm['firstName']->getData(),
                    'name' => $webForm['name']->getData(),
                ])
                ->htmlTemplate('formulaire/reponse.html.twig');
            $mailer->send($emailRep);
        }

        $logoForm = $this->createForm(logoType::class);
        $logoForm->handleRequest($request);

        if ( $logoForm->isSubmitted() &&  $logoForm->isValid()) {
            $email = (new TemplatedEmail())
                ->from( $logoForm['email']->getData())
                ->to((new Address('vivien.joly@hotmail.fr')))
                ->subject( $logoForm['sujet']->getData())
                ->context([
                    'firstName' =>  $logoForm['firstName']->getData(),
                    'name' =>  $logoForm['name']->getData(),
                    'business' =>  $logoForm['business']->getData(),
                    'mail' =>  $logoForm['email']->getData(),
                    'telephone' =>  $logoForm['telephone']->getData(),
                    'sujet' =>  $logoForm['sujet']->getData(),
                    'contenu' =>  $logoForm['contenu']->getData(),
                ])
                ->htmlTemplate('formulaire/general.html.twig');
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé !');

            $emailRep = (new TemplatedEmail())
                ->from((new Address('com25agence@gmail.com', 'Com25')))
                ->to($logoForm['email']->getData())
                ->subject('Message bien reçu')
                ->context([
                    'firstName' => $logoForm['firstName']->getData(),
                    'name' =>$logoForm['name']->getData(),
                ])
                ->htmlTemplate('formulaire/reponse.html.twig');
            $mailer->send($emailRep);
        }

        $publiciteForm = $this->createForm(publiciteType::class);
        $publiciteForm->handleRequest($request);

        if ( $publiciteForm->isSubmitted() &&  $publiciteForm->isValid()) {
            $email = (new TemplatedEmail())
                ->from($publiciteForm['email']->getData())
                ->to((new Address('vivien.joly@hotmail.fr')))
                ->subject( $publiciteForm['sujet']->getData())
                ->context([
                    'firstName' =>  $publiciteForm['firstName']->getData(),
                    'name' =>  $publiciteForm['name']->getData(),
                    'business' =>  $publiciteForm['business']->getData(),
                    'mail' =>  $publiciteForm['email']->getData(),
                    'telephone' =>  $publiciteForm['telephone']->getData(),
                    'sujet' =>  $publiciteForm['sujet']->getData(),
                    'contenu' =>  $publiciteForm['contenu']->getData(),
                ])
                ->htmlTemplate('formulaire/general.html.twig');
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé !');

            $emailRep = (new TemplatedEmail())
                ->from((new Address('com25agence@gmail.com', 'Com25')))
                ->to($publiciteForm['email']->getData())
                ->subject('Message bien reçu')
                ->context([
                    'firstName' => $publiciteForm['firstName']->getData(),
                    'name' => $publiciteForm['name']->getData(),
                ])
                ->htmlTemplate('formulaire/reponse.html.twig');
            $mailer->send($emailRep);


        }

        return $this->render('index.html.twig', [
            'generalForm' => $generalForm->createView(),
            'devisForm' =>$devisForm->createView(),
            'webForm' => $webForm->createView(),
            'logoForm' =>  $logoForm->createView(),
            'publiciteForm' => $publiciteForm->createView(),
        ]);
    }
}
