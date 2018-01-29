<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmActeurRepository")
 */
class FilmActeur
{



    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity="Film", inversedBy="filmacteurs")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity="Acteur", inversedBy="filmacteurs")
     * @ORM\JoinColumn(name="acteur_id", referencedColumnName="id")
     */
    private $acteur;

    /**
     * @ORM\OneToMany(targetEntity="Acteur", mappedBy="film", cascade={"persist"})
     */
    //private $acteurs;


    public function __construct()
    {
        $this->acteur = new ArrayCollection();
        $this->film = new ArrayCollection();
        $this->acteur = new ArrayCollection();
    }


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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film)
    {
        $this->film = $film;
    }

    /**
     * @return mixed
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * @param mixed $acteur
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;
    }

    /**
     * @return mixed
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * @param mixed $acteurs
     */
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;
    }







}
