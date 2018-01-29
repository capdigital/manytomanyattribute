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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use App\Repository\FilmRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class FilmController extends Controller
{

    /**
     * @Route("/film", name="film")
     */
    public function ficheinformation(Request $request)
    {
        $film_id = $request->query->get('id');
        echo("id : ".$film_id);

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

        $tmp = array(
            1 => 1,
            2 => 2,
        );

        $form = $this->createFormBuilder($formFilm)

            ->add('titre', TextType::class, array(
                'label' => 'Titre du film : ',

            ))

            ->add('filmacteurs', CollectionType::class, array(
                'entry_type' => ActeurType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
            ))

/*
            ->add('filmacteurs', ChoiceType::class, array(
                'expanded' => true,
                //'multiple' => true,
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                ),
            ))
*/
/*
            ->add('filmacteurs', EntityType::class, array(
                // query choices from this entity
                'class' => Acteur::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
            ))
*/
            /*
            ->add('filmacteurs', EntityType::class, array(
                // query choices from this entity
                'class' => Acteur::class,
                'choice_label' => 'acteur.nom',
                'multiple' => true,
                'expanded' => true,
            ))
            */

            /*
// duplique le div
            ->add('filmacteurs', CollectionType::class, array(
                // each entry in the array will be an "email" field
                'entry_type'   => FilmActeurType::class,
                //'allow_add' => true,
                //'allow_delete' => true,
                // these options are passed to each "email" type
                //'entry_options'  => array(
                //    'choices'  => Acteur::class
                    //'attr'      => array('class' => 'email-box')
                //)
            ))
*/

            /*
            // duplique le div
            ->add('filmacteurs', CollectionType::class, array(
                // each entry in the array will be an "email" field
                'entry_type'   => ActeurType::class,
                //'allow_add' => true,
                //'allow_delete' => true,
                // these options are passed to each "email" type
                //'entry_options'  => array(
                //    'choices'  => Acteur::class
                //'attr'      => array('class' => 'email-box')
                //)
            ))
            */

            /*
            ->add('filmacteurs', EntityType::class, array(
                'class' => Acteur::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
            ))
*/
/*
            ->add('filmacteurs', ChoiceType::class, array(
                'data_class' => Acteur::class
                //'placeholder' => false,
            ))
*/
/*
            ->add('filmacteurs', EntityType::class,
                array(
                    'choices' => Acteur::class,
                    //'choice_label' => 'acteur.id',
                    'expanded' => true,
                    'multiple' => true,
                    'class' => 'App:FilmActeur',
                    //'choices' => 'App:Acteur'
                    //'data' => ''
                ))
            */

/*
            ->add('filmacteurs', EntityType::class, array(
                'class'    => FilmActeur::class,
                'choice_label' => 'role',
                'multiple' => true,
                'expanded' => false
            ))
            */

/*
            ->add('filmacteurs', CollectionType::class, array(
                'entry_type'   => ChoiceType::class,
                'entry_options'  => array(
                    'choices'  => Acteur::class
                    //'attr'      => array('class' => 'email-box')
                )
            ))
*/
/*
            ->add('filmacteurs', CollectionType::class, array(
                'entry_type' => EntityType::class,
                'allow_add' => true,
                'allow_delete' => true,
                //'label' => $labels[0],
                'entry_options' => array(
                    'class' => Acteur::class,
                    'choice_label' => 'nom',
                    //'placeholder' => '-Pasirinkite-',
                    //'required' => false,
                    //'mapped' => false,
                    //'label_attr' => array('class' => $label_offset),
                    //'attr' => array('class' => $styles.' brand-field')
                    )
            ))
*/

/*
            ->add('filmacteurs', CollectionType::class, array(
                //'entry_type' => ActeurType::class,
                //'entry_type' => FilmActeurType::class,
                'entry_type' => FilmActeurType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ))
*/
/*
            ->add('filmacteurs', ActeurType::class, array(
                'data_class' => Acteur::class
                //'class' => 'App:Acteur',
                //'choice_label' => 'nom',
                //'multiple' => true,
                //'expanded' => true,
            ))
*/
/*
            ->add('acteurs', EntityType::class, array(
                'class' => 'App:Acteur',
                'choice_label' => 'prenom',
                'multiple' => true,
                'expended' => true,
                //'allow_add' => true,
                //'allow_delete' => true,
                //'prototype' => true,
                //'by_reference' => false

            ))
*/

            ->add('save', SubmitType::class, array('label' => 'Enregistrer'))
            ->getForm();


        // Update
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formFilm);
            $em->flush();


            return $this->redirectToRoute('fiche_information_flush_confirmed');
        }


        return $this->render('film/film.html.twig', array('form' => $form->createView()));
    }



}
