<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use PhpParser\Node\Expr\AssignOp\Concat;
use App\Entity\Avis;
use App\Form\AvisType;
use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Presentation;

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
        $presentation = $this->getDoctrine()->getRepository(Presentation::class)->find(1);

        return $this->render('site_boulang/index.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'formAvis' => $formAvis->createView(),
            'Presentation'=>$presentation
        ]);
    }

    


    /**
     * @Route("/contact", name="contact")
     */
    public function Contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();

        $formAvis = $this->createForm(AvisType::class, $avis);

        $formAvis->handleRequest($request);
        if ($formAvis->isSubmitted() && $formAvis->isValid()) {
            $entityManager->persist($avis);
            
            $entityManager->flush();
            return $this->redirectToRoute('avis');
        }

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
            'formContact' => $formContact->createView(),
            'formAvis' => $formAvis->createView()
        ]);
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

    /**
     * @Route("/prestation", name="prestation")
     */
    public function Prestations(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!empty($_POST['idPrestationSupp'])){
            $PrestationSuppr = $this->getDoctrine()->getRepository(Produit::class)->find($_POST['idPrestationSupp']);
            $entityManager->remove($PrestationSuppr);
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

        $produit = new Produit();
        $formProduit = $this->createForm(ProduitType::class, $produit);

        $formProduit->handleRequest($request);
        if ($formProduit->isSubmitted() && $formProduit->isValid()) {
            $entityManager->persist($produit);
            
            $entityManager->flush();
            return $this->redirectToRoute('prestation');
        }

        $repos = $this->getDoctrine()->getRepository(Produit::class);
        $LesProduits = $repos->findAll();
        
        return $this->render('site_boulang/Prestations.html.twig', [
            'controller_name' => 'SiteBoulangController',
            'formAvis' => $formAvis->createView(),
            'LesProduits'=> $LesProduits,
            'FormProduit' => $formProduit->createView()
        ]);
    }
}
