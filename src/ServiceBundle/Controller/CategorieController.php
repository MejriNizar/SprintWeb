<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 4/10/2019
 * Time: 12:18 AM
 */

namespace ServiceBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use ServiceBundle\Entity\categorie;
use ServiceBundle\Form\categorieType;
use ServiceBundle\Repository\categorieRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    public function indexAction()
    {
        return $this->render('ServiceBundle:Default:categories.html.twig');
    }

    public function ajouterAction(Request $request)
    {
        {
            $categorie = new categorie();
            //prepare the form with the function: createForm()
            $form = $this->createForm(categorieType::class, $categorie);
            //extract the form answer from the received request
            $form = $form->handleRequest($request);
            //if this form is valid
            if ($form->isValid()) {
//create an entity manager object
                $file = $categorie->getImage();

                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('annonce_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
                $categorie->setImage($fileName);
                //create an entity manager object


                // updates the 'brochure' property to store the PDF file name
                // instead of its contents


                $em = $this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                //persist the object $modele in the ORM
                //redirect the route after the add
                return $this->redirectToRoute('ajouterCategorie');

            }
            return $this->render('@Service/Default/categories.html.twig',
                array(
                    'form' => $form->createView()
                ));
        }
    }
    public function afficherBackAction()
    {
        $categories=$this->getDoctrine()->getRepository(categorie::class)->findAll();
        return $this->render('@Service/Default/afficher.html.twig',array("categories"=>$categories,"erreur"=>"false"));
    }
    public function modifierAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $categorie=$this->getDoctrine()->getRepository(categorie::class)->find($id);
        $form=$this->createForm(categorieType::class,$categorie);
        if($request->isMethod('POST')&& $form->handleRequest($request)->isValid())
        {
            $em->getRepository("ServiceBundle:categorie")->update($categorie);

            return $this->redirectToRoute('afficherCategoriesBack');
        }
        return $this->render('@Service/Default/categories.html.twig',array('form'=>$form->createView(),"erreur"=>'false'));

    }
    public function supprimerAction($id)
    {
        $em= $this->getDoctrine()->getManager();

        $em->getRepository("ServiceBundle:categorie")->delete($id);
        return $this->redirectToRoute("afficherCategoriesBack");
    }
    public function chercherAction(Request $request)
    {   $nom=$request->get('nom');
        $em=$this->getDoctrine()->getManager();
        $categories=$em->getRepository("ServiceBundle:categorie")->findDQL($nom);
        return $this->render('@Service/Default/afficher.html.twig',array('categories'=>$categories));
    }
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}