<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteBoulangController extends AbstractController
{
    /**
     * @Route("/", name="Index")
     */
    public function index(): Response
    {
        return $this->render('site_boulang/index.html.twig', [
            'controller_name' => 'SiteBoulangController',
        ]);
    }

    /**
     * @Route("/prestations", name="Prestations")
     */
    public function prestations(): Response
    {
        return $this->render('site_boulang/prestations.html.twig', [
            'controller_name' => 'SiteBoulangController',
        ]);
    }

    /**
     * @Route("/commandes/produits", name="Produits")
     */
    public function produits(): Response
    {
        return $this->render('site_boulang/commandes/produits.html.twig', [
            'controller_name' => 'SiteBoulangController',
        ]);
    }

    /**
     * @Route("/commandes/evenements", name="Evenements")
     */
    public function evenements(): Response
    {
        return $this->render('site_boulang/commandes/evenements.html.twig', [
            'controller_name' => 'SiteBoulangController',
        ]);
    }
}
