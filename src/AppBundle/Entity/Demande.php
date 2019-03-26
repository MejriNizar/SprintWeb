<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_prestataire", columns={"id_prestataire"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_service", type="integer", nullable=true)
     */
    private $idService;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="Prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rdv", type="date", nullable=true)
     */
    private $dateRdv;

    /**
     * @var binary
     *
     * @ORM\Column(name="statut", type="binary", nullable=false)
     */
    private $statut;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prestataire", referencedColumnName="id")
     * })
     */
    private $idPrestataire;

    /**
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return int
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * @param int $idService
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \DateTime
     */
    public function getDateRdv()
    {
        return $this->dateRdv;
    }

    /**
     * @param \DateTime $dateRdv
     */
    public function setDateRdv($dateRdv)
    {
        $this->dateRdv = $dateRdv;
    }

    /**
     * @return binary
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param binary $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return FosUser
     */
    public function getIdPrestataire()
    {
        return $this->idPrestataire;
    }

    /**
     * @param FosUser $idPrestataire
     */
    public function setIdPrestataire($idPrestataire)
    {
        $this->idPrestataire = $idPrestataire;
    }


}

