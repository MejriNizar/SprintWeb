<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 11/04/2019
 * Time: 15:26
 */

namespace DemandeOffreBundle\Repository;


class DemandeRepository extends \Doctrine\ORM\EntityRepository
{
    public function DemandeDQL($id){

        $query=$this->getEntityManager()
            ->createQuery("Select d from DemandeOffrebundle:Demande d ")
            ->setParameter('id',$id);
        return $query->getResult();


    }


}