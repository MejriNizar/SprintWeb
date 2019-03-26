<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rating", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRating;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_question", type="integer", nullable=false)
     */
    private $idQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="oui/non", type="string", length=4, nullable=false)
     */
    private $oui_non;

    /**
     * @return int
     */
    public function getIdRating()
    {
        return $this->idRating;
    }

    /**
     * @param int $idRating
     */
    public function setIdRating($idRating)
    {
        $this->idRating = $idRating;
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
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * @param int $idQuestion
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;
    }

    /**
     * @return string
     */
    public function getOuiNon()
    {
        return $this->oui_non;
    }

    /**
     * @param string $oui_non
     */
    public function setOuiNon($oui_non)
    {
        $this->oui_non = $oui_non;
    }


}

