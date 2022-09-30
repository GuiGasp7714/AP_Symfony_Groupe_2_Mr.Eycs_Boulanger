<?php

namespace App\Controller;

use App\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        $form = $this->createForm(UtilisateurType::class);
        return $this->render('site_boulang/Connexion.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'form' => $form->createView()
        ]);
    }
}
