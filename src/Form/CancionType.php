<?php

namespace App\Form;

use App\Entity\Cancion;
use App\Entity\Disco;
use Doctrine\Inflector\Rules\Pattern;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class CancionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo', TextType::class, [
                'label' => 'Título',
                'required' => true
            ])
            ->add('duracion', TextType::class, [
                'label' => 'Duración',
                'required' => true,
                'attr' => [
                    'placeholder' => '00:00'
                ],
                'constraints'=> [
                    new Regex(array(
                        'pattern' => '/^\d{2}:\d{2}$/',
                        'message' => 'utilize el formato "00:00"'
                    ))
                ]
            ])
            ->add('letra', TextareaType::class, [
                'label' => 'Letra',
                'required' => false
            ])
            ->add('disco', EntityType::class, [
                'label' => 'Disco',
                'class' => Disco::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cancion::class,
        ]);
    }
}
