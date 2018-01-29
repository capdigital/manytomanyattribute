<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{

    public function __construct()
    {
        $this->filmacteurs = new ArrayCollection();
        //$this->acteurs = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\OneToMany(targetEntity="FilmActeur", mappedBy="film", cascade={"persist"})
     */
    private $filmacteurs;






    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getFilmacteurs()
    {
        //var_dump($this->filmacteurs);//exit();
        return $this->filmacteurs;
    }

    /**
     * @param mixed $filmacteurs
     */
    public function setFilmacteurs($filmacteurs)
    {
        //echo("test");exit();
        //$tmp = new FilmActeur();
        //$this->filmacteurs = $tmp;

        $this->filmacteurs = $filmacteurs;
    }





}
