<?php

namespace App\Form;

use App\Entity\Banda;
use App\Entity\Disco;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

class DiscoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo', TextType::class, [
                'label' => 'Título',
                'required' => true
            ])
            ->add('anioLanzamiento', IntegerType::class,[
                'label' => 'Año creación',
                'constraints' => [
                    new Length(4)
                ]
            ])
            ->add('tipo', ChoiceType::class, [
                'label' => 'Tipo',
                'required' => true,
                'expanded' => true,
                'choices'  => [
                    'Älbum' => false,
                    'EP' => false,
                    'Sencillo' => false
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'selecciona un tipo'
                    ]),
                ]
            ])
            ->add('banda', EntityType::class, [
                'label' => 'Artista',
                'class' => Banda::class,
                'multiple' => false,

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disco::class,
        ]);
    }
}
