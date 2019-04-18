<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 4/10/2019
 * Time: 4:45 PM
 */

namespace ServiceBundle\Repository;

use ServiceBundle\Entity\categorie;

class categorieRepository extends \Doctrine\ORM\EntityRepository
{
    public function update(categorie $categorie)
    {
        $query=$this->getEntityManager()->createQuery('UPDATE ServiceBundle:categorie p set p.nom=:nom , p.description=:description  where p.id=:id')->setParameters(array('id'=>$categorie->getId(),'nom'=>$categorie->getNom(),'description'=>$categorie->getDescription()));
        $query->execute();
    }
    public function delete($id)
    {

        $query=$this->getEntityManager()->createQuery('DELETE ServiceBundle:categorie p where p.id =:id')->setParameter('id',$id);
        $query->execute();
    }

    public function findDQL($nom)
    {
        $query=$this->getEntityManager()->createQuery("SELECT c from ServiceBundle:categorie c WHERE c.nom like :nom")->setParameter(':nom','%'.$nom.'%');
        return $query->getResult();
    }
    public function findNoms()
    {
        $query=$this->getEntityManager()->createQuery("SELECT c from ServiceBundle:categorie c ");
        return $query->getResult();
    }
    public function chercherNom(categorie $categorie)
    {
        $query=$this->getEntityManager()->createQuery("SELECT c from ServiceBundle:categorie c WHERE (c.nom =:nom) ")->setParameter(':nom',$categorie->getNom());
        return $query->getResult();
    }
}