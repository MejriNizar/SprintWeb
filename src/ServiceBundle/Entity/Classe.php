<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 18/04/2019
 * Time: 00:43
 */

namespace ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Classe
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbModules;
/**
 * @ORM\Column(type="integer")
 */
    private $nbEtudiants;
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function getNbModules(){
        return $this->nbModules;
    }
    public function setNbModules($nbMod){
        $this->nbModules=$nbMod;
    }
    public function getNbEtudiants(){
        return $this->nbEtudiants;
    }
    public function setNbEtudiants($nbE){
        $this->nbEtudiants=$nbE;
    }
}