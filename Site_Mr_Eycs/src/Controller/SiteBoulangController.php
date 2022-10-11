<?php

namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use PhpParser\Node\Expr\AssignOp\Concat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SiteBoulangController extends AbstractController
{
    /**
     * @Route("/", name="app_site_boulang")
     */
    public function index(): Response
    {
        return $this->render('site_boulang/index.html.twig', [
            'controller_name' => 'SiteBoulangController',
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function Connexion(): Response
    {
        return $this->render('site_boulang/Connexion.html.twig', [
            'controller_name' => 'SiteBoulangController',
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function Contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();


        $formContact = $this->createForm(ContactType::class, $contact);

        $formContact->handleRequest($request);
        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute('app_site_boulang');
        }
        return $this->render('site_boulang/contact.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'formContact' => $formContact->createView()
        ]);
    }
}
