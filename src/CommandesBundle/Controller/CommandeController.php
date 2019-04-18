<?php

namespace CommandesBundle\Controller;

use CommandesBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use CommandesBundle\Entity\ProduitPanier;


use CommandesBundle\Entity\LigneCommande;
use AppBundle\Entity\FosUser;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

use ProduitsBundle\Entity\Produit;

use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Commande controller.
 *
 * @Route("commande")
 */
class CommandeController extends Controller
{
    /**
     * Finds and displays a user entity.
     *
     * @Route("/new/{prix_total}/{id_u}", name="ajout_commande")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('CommandesBundle:Commande')->findAll();

        return $this->render('@Commandes/commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     * @Route("/new", name="commande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commande = new Commande();
        $form = $this->createForm('CommandesBundle\Form\CommandeType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('commande_show', array('idCommande' => $commande->getIdcommande()));
        }

        return $this->render('@Commandes/commande/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commande entity.
     *
     * @Route("/{idCommande}", name="commande_show")
     * @Method("GET")
     */
    public function showAction(Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);

        return $this->render('@Commandes/commande/show.html.twig', array(
            'commande' => $commande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commande entity.
     *
     * @Route("/{idCommande}/edit", name="commande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);
        $editForm = $this->createForm('CommandesBundle\Form\CommandeType', $commande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commande_edit', array('idCommande' => $commande->getIdcommande()));
        }

        return $this->render('@Commandes/commande/edit.html.twig', array(
            'commande' => $commande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commande entity.
     *
     * @Route("/{idCommande}", name="commande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commande $commande)
    {
        $form = $this->createDeleteForm($commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commande);
            $em->flush();
        }

        return $this->redirectToRoute('commande_index');
    }

    /**
     * Creates a form to delete a commande entity.
     *
     * @param Commande $commande The commande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commande $commande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('idCommande' => $commande->getIdcommande())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function addProduitPanierAction($idProduit,Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $lc=new LigneCommande();
        $user=  $this->getUser();
        $idUser=$user->getId();

        $lc->setIdprod($idProduit);
        $lc->setIdUser($idUser);
        $lc->setQuantite(1);


        $testSurNom=$em->getRepository("CommandesBundle:LigneCommande")->chercherid($idProduit);
        if($testSurNom==null)
        {$em->persist($lc);
            $em->flush();
            $lignePanier=$this->getDoctrine()->getRepository(LigneCommande::class)->findPanier($user->getId());


            $em    = $this->get('doctrine.orm.entity_manager');
            $dql   = "SELECT a FROM ProduitsBundle:Produit a";
            $query = $em->createQuery($dql);

            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                10/*limit per page*/
            );
            return $this->render('@Commandes/Default/index.html.twig',array('produits'=>$lignePanier,'pagination'=>$pagination));

        }

        return $this->redirectToRoute('listeProduit',array('erreur'=>"true"));
        // $em->persist($lc);
        //$em->flush();

    }
    public function consulterPanierAction()
    {
        $user=  $this->getUser();
        $lignePanier=$this->getDoctrine()->getRepository(LigneCommande::class)->findPanier($user->getId());
        $listProd=$this->getDoctrine()->getRepository(LigneCommande::class)->findProduit();

        return $this->render('@Commandes/Default/index.html.twig',array('prod'=>$listProd,'produits'=>$lignePanier));
    }
    public function supprimerProduitPanierAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $em->getRepository("CommandesBundle:LigneCommande")->delete($id);
        return $this->redirectToRoute("consulterPanier");
    }
}
