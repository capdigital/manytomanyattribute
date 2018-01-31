<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\FilmActeur;
/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    public function __construct()
    {
        $this->filmacteurs = new ArrayCollection();
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
     * @ORM\OneToMany(targetEntity="FilmActeur", mappedBy="film", cascade={"all"}, orphanRemoval=true)
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
        //var_dump($this->filmacteurs->isArray());exit();

        //echo($this->filmacteurs->getData());exit();

        return $this->filmacteurs;
    }

    /**
     * @param mixed $filmacteurs
     */
    public function setFilmacteurs($filmacteurs)
    {
        $this->filmacteurs = $filmacteurs;
    }



    // On récupère acteur_film pour les injecter dans notre champs "acteur"
    // Permet de cocher les acteurs déjà sélectionnés dans la DB
    public function getActeur()
    {
        $acteurs = new ArrayCollection();

        foreach($this->filmacteurs as $a)
        {
            $acteurs[] = $a->getActeur();
        }
        return $acteurs;
    }

    public function setActeur($acteurs)
    {

    }

    public function addFilmActeur($filmacteurs)
    {
        $this->filmacteurs[] = $filmacteurs;
    }

    public function removeFilmActeur($filmacteurs)
    {
        $this->filmacteurs->removeElement($filmacteurs);
    }

}