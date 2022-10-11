<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Presentation;

class SiteBoulangController extends AbstractController
{
    /**
     * @Route("/", name="app_site_boulang")
     */
    public function index(): Response
    {
        $presentation = $this->getDoctrine()->getRepository(Presentation::class)->find(1);

        return $this->render('site_boulang/index.html.twig', [
            'controller_name' => 'mon amis',
            'Presentation'=>$presentation
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
}
