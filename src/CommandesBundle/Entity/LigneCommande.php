<?php

namespace CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneCommande
 *
 * @ORM\Table(name="ligne_commande")
 * @ORM\Entity(repositoryClass="CommandesBundle\Repository\ligneCommandeRepository")
 */
class LigneCommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var integer
     *
     * @ORM\Column(name="idCommande", type="integer",nullable=true)
     */

    private $idCommande;
    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;
<<<<<<< HEAD

    /**
     * @return \AppBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
=======

    /**
     * @return \AppBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
>>>>>>> 1453b8fe36090e5d7587461cd7c31b60229a01ab
     * @param \AppBundle\Entity\FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
<<<<<<< HEAD


    /**
     * @var \ProduitsBundle\Entity\Produit
     *
     * @ORM\ManyToOne(targetEntity="ProduitsBundle\Entity\Produit")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
=======
    /**
     * @var integer
>>>>>>> 1453b8fe36090e5d7587461cd7c31b60229a01ab
     *
     */
    private $produit;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite = '1';

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
     * @return \ProduitsBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param \ProduitsBundle\Entity\Produit $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }






    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }


}

