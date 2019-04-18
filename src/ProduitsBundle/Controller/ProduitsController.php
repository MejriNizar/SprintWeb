<?php

namespace ProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ProduitsBundle\Entity\Produit;
use ProduitsBundle\Entity\Fournisseur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProduitsController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProduitsBundle:Default:produit.html.twig');
    }

    public function listeProduitAction(){
        $em= $this->getDoctrine()->getManager();
        $Produits=$em->getRepository("ProduitsBundle:Produit")->findAll();
        return $this->render('ProduitsBundle:Default:liste_produits.html.twig', array("produits"=>$Produits));

    }
    public function ajoutproduitAction(Request $request)
    {

        $Produit = new Produit();
        $em= $this->getDoctrine()->getManager();
        $fournisseurs = $em->getRepository("ProduitsBundle:Fournisseur")->findAll();
        if ($request->isMethod('POST')) {

            $Produit->setNom($request->get('nom'));
            $Produit->setDescription($request->get('description'));
            $Produit->setReference($request->get('reference'));
            $Produit->setPrix($request->get('prix'));
            $Produit->setCategorie($request->get('categorie'));
            $Produit->setQuantite($request->get('quantite'));
            $Fournisseur = $em->getRepository("ProduitsBundle:Fournisseur")->find($request->get('fournisseur'));
            $Produit->setFournisseurId($Fournisseur);
            $file = $request->files->get('image');
            $fileName = $file->getClientOriginalName();
            $file->move($this->container->getParameter('path_image_produit'),$fileName);
            $Produit->setImage($fileName);
            $dt=new \DateTime();
            $dt->add(new \DateInterval('PT1H'));
            $Produit->setDatecreation($dt);


            $em->persist($Produit);
            $em->flush();
            return $this->redirectToRoute('produits_listeProduit');


        }
        return $this->render('ProduitsBundle:Default:ajoutproduit.html.twig',array("fournisseurs"=>$fournisseurs));


    }


    public function consulterProduitAction(){
        $em= $this->getDoctrine()->getManager();
        $Produits=$em->getRepository("ProduitsBundle:Produit")->findAll();
        return $this->render('ProduitsBundle:Default:consulter_produits.html.twig', array("produits"=>$Produits));

    }


    public function listeFournisseurAction(){
        $em= $this->getDoctrine()->getManager();
        $Fournisseurs=$em->getRepository("ProduitsBundle:Fournisseur")->findAll();
        return $this->render('ProduitsBundle:Default:liste_fournisseurs.html.twig', array("fournisseurs"=>$Fournisseurs));

    }

    public function ajoutfournisseurAction(Request $request)
    {

        $Fournisseur = new Fournisseur();
        $em= $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

            $Fournisseur->setNom($request->get('nom'));
            $Fournisseur->setNumero($request->get('numero'));

            $em->persist($Fournisseur);
            $em->flush();
            return $this->redirectToRoute('produits_listeFournisseur');


        }
        return $this->render('ProduitsBundle:Default:ajoutfournisseur.html.twig');


    }
}
