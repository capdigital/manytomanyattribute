<?php

namespace App\Form;

use App\Entity\FilmActeur;
use App\Entity\Acteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FilmActeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('acteur', EntityType::class, array(
                'class' => Acteur::class,
                'choice_label' => 'nom',
                //'multiple' => true,
                'expanded' => true,
            ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FilmActeur::class,
        ]);
    }
}
