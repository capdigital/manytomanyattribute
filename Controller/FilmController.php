<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Acteur;
use App\Entity\FilmActeur;
use App\Form\ActeurType;
use App\Form\FilmActeurType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use App\Repository\FilmRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
// https://github.com/pmoubed/Symfony2Tutorial
// http://www.prowebdev.us/2012/07/symfnoy2-many-to-many-relation-with.html
// https://github.com/winzou/OCPlatform/blob/master/src/OC/PlatformBundle/Entity/Advert.php


class FilmController extends Controller
{

    /**
     * @Route("/film", name="film")
     */
    public function ficheinformation(Request $request)
    {
        $film_id = $request->query->get('id');


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:Film')
        ;


        if($film_id >= 1) {
            $formFilm = $repository->findOneBy(
                array('id' => $film_id)
            );
        } else {
            $formFilm = new Film();
        }


        $form = $this->createFormBuilder($formFilm)

            ->add('titre', TextType::class, array(
                'label' => 'Titre du film : ',

            ))

            ->add('acteur' , EntityType::class , array(
                'class' => 'App:Acteur',
                'choice_label' => 'nom',
                'expanded' => true,
                'multiple' => true,
                ))

            ->add('save', SubmitType::class, array('label' => 'Enregistrer'))
            ->getForm();


        // Update
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Ajout des acteurs au film
            // On parcours les acteurs sélectionnés
            foreach($form->get('acteur')->getData() as $a)
            {
                if(!$formFilm->getActeur()->contains($a))
                {
                    // On ajoute cet acteur
                    $newFilmacteurs = new FilmActeur();
                    $newFilmacteurs->setFilm($formFilm);
                    $newFilmacteurs->setActeur($a);
                    $formFilm->addFilmActeur($newFilmacteurs);
                }
            }

            // Suppression des acteurs au film
            // On parcours les acteurs de la DB
            foreach($formFilm->getActeur() as $a)
            {
                if(!$form->get('acteur')->getData()->contains($a))
                {
                    // On supprime cet acteur
                  $oldFilmacteurs = $this->getDoctrine()->getManager()->getRepository('App:FilmActeur')->findOneBy(array('film' => $formFilm->getId(), 'acteur' => $a->getId()));
                  //$formFilm->getFilmacteurs()->removeElement($oldFilmacteurs);
                  $formFilm->removeFilmActeur($oldFilmacteurs);
                }
            }

            // Enregistrement dans la DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($formFilm);
            $em->flush();

            return $this->redirectToRoute('fiche_information_flush_confirmed');
        }


        return $this->render('film/film.html.twig', array('form' => $form->createView()));
    }



}
