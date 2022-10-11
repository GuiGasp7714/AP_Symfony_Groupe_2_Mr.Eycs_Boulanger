<?php


namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
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
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();


        $formAvis = $this->createForm(AvisType::class, $avis);

        $formAvis->handleRequest($request);
        if ($formAvis->isSubmitted() && $formAvis->isValid()) {
            $entityManager->persist($avis);
            $entityManager->flush();
            return $this->redirectToRoute('avis');
        }
        return $this->render('site_boulang/index.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'formAvis' => $formAvis->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function Connexion(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();

        $formAvis = $this->createForm(AvisType::class, $avis);
        $formAvis->handleRequest($request);

        if ($formAvis->isSubmitted() && $formAvis->isValid()) {
            $entityManager->persist($avis);
            $entityManager->flush();
            return $this->redirectToRoute('avis');
        }
        return $this->render('site_boulang/Connexion.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'formAvis' => $formAvis->createView()
        ]);
    }

    /**
     * @Route("/avis", name="avis")
     */
    public function Avis(Request $request, EntityManagerInterface $entityManager): Response
    {
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

    /**
     * @Route("/prestation", name="prestation")
     */
    public function Prestations(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produit();

        $formProduit = $this->createForm(ProduitType::class, $produit);

        $formProduit->handleRequest($request);
        if ($FormProduit->isSubmitted() && $FormProduit->isValid()) {
            $entityManager->persist($produit);
            
            $entityManager->flush();
            return $this->redirectToRoute('prestation');
        }

        $repos = $this->getDoctrine()->getRepository(Produit::class);
        $LesProduits = $repos->findAll();
        
        return $this->render('site_boulang/Prestations.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'LesProduits'=> $LesProduits,
            'FormProduit' => $FormProduit->createView()
        ]);
    }
}
