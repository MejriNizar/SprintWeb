<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity
 */
class Facture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_facture", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFacture;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     */
    private $idCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix_totale", type="integer", nullable=true)
     */
    private $prixTotale = '0';

    /**
     * @return int
     */
    public function getIdFacture()
    {
        return $this->idFacture;
    }

    /**
     * @param int $idFacture
     */
    public function setIdFacture($idFacture)
    {
        $this->idFacture = $idFacture;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param int $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return int
     */
    public function getPrixTotale()
    {
        return $this->prixTotale;
    }

    /**
     * @param int $prixTotale
     */
    public function setPrixTotale($prixTotale)
    {
        $this->prixTotale = $prixTotale;
    }


}

