<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 08/04/2019
 * Time: 02:24
 */

namespace DemandeOffreBundle\Repository;


class OffreRepository extends \Doctrine\ORM\EntityRepository
{
    public function FindByLetters($string)
    {
        $query = $this->getEntityManager()->createQuery("SELECT a FROM DemandeOffreBundle:Offre a WHERE (a.titre like :titre)")
            ->setParameter('titre','%'.$string.'%');

        return $query->getResult();
    }
    public function delete($id)
    {
        $query1 = $this->getEntityManager()->createQuery('DELETE DemandeOffreBundle:Offre c where c.id =:id')->setParameter('id', $id);
        $query1->execute();
    }
}