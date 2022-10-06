<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/creationDeCompte", name="creationDeCompte")
     */
    public function creationDeCompte(Request $request, EntityManagerInterface $manager): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($utilisateur);
            $manager->flush();

            return $this->redirectToRoute('app_site_boulang');
        }
        return $this->render('site_boulang/creationDeCompte.twig', [
            'controller_name' => 'SiteBoulangController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(Request $request, EntityManagerInterface $manager): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($utilisateur);
            $manager->flush();

            return $this->redirectToRoute('app_site_boulang');
        }
        return $this->render('site_boulang/connexion.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'form' => $form->createView()
        ]);
    }
}
