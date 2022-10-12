<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Avis;
use App\Form\AvisType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_site_boulang');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $avis = new Avis();
        $formAvis = $this->createForm(AvisType::class, $avis);

        $formAvis->handleRequest($request);
        if ($formAvis->isSubmitted() && $formAvis->isValid()) {
            $entityManager->persist($avis);
            
            $entityManager->flush();
            return $this->redirectToRoute('avis');
        }


        return $this->render('security/login.html.twig', 
        ['last_username' => $lastUsername, 
        'error' => $error, 
        'formAvis' => $formAvis->createView(),
    ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }



    /**
     * @Route("/avis", name="avis")
     */
    public function Avis(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!empty($_POST['idAvisSupp'])){
            $AvisSuppr = $this->getDoctrine()->getRepository(Avis::class)->find($_POST['idAvisSupp']);
            $entityManager->remove($AvisSuppr);
            $entityManager->flush();
        }
        
        $avis = new Avis();

        $formAvis = $this->createForm(AvisType::class, $avis);

        $formAvis->handleRequest($request);
        if ($formAvis->isSubmitted() && $formAvis->isValid()) {
            $entityManager->persist($avis);
            
            $entityManager->flush();
            return $this->redirectToRoute('avis');
        }

        $repos = $this->getDoctrine()->getRepository(Avis::class);
        $LesAvis = $repos->findAll();
        
        return $this->render('site_boulang/Avis.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'LesAvis'=> $LesAvis,
            'formAvis' => $formAvis->createView()
        ]);
    }
}
