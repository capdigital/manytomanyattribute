<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActeurRepository")
 */
class Acteur
{

    public function __construct()
    {
        $this->filmacteurs = new ArrayCollection();
        $this->films = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Film", mappedBy="acteurs", cascade={"persist"})
     */
    private $films;

    /**
     * @ORM\OneToMany(targetEntity="FilmActeur", mappedBy="acteur", cascade={"persist"})
     */
    private $filmacteurs;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getFilmacteurs()
    {
        return $this->filmacteurs;
    }

    /**
     * @param mixed $filmacteurs
     */
    public function setFilmacteurs($filmacteurs)
    {
        $this->filmacteurs = $filmacteurs;
    }

    /**
     * @return mixed
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * @param mixed $films
     */
    public function setFilms($films)
    {
        $this->films = $films;
    }




}
