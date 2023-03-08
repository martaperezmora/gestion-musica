<?php

namespace App\Form;

use App\Entity\Artista;
use App\Entity\Banda;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class BandaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre',
                'required' => true
            ])
            ->add('anioCreacion', IntegerType::class,[
                'label' => 'Año creación',
                'constraints' => [
                    new Length(4)
                ]
            ])
            ->add('pais', TextType::class,[
                'label' => 'País',
                'required' => true
            ])
            ->add('genero', ChoiceType::class, [
                'label' => 'Género',
                'required' => true,
                'choices'  => [
                    'heavy metal' => false,
                    'power metal' => false,
                    'death metal' => false,
                    'black metal' => false,
                    'melodic black metal' => false,
                    'doom metal' => false,
                    'folk metal' => false,
                    'melodeath' => false
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'selecciona un género'
                    ]),
                ]
            ])
            ->add('activo', CheckboxType::class,[
                'label' => 'Activo',
                'required' => false
            ])
            ->add('miembros', EntityType::class, [
                'label' => 'Miembros',
                'class' => Artista::class,
                'multiple' => true,
                'constraints' => [
                    new Count([
                        'min' => 1,
                        'max' => 6,
                        'minMessage' => 'la banda debe tener un miembro',
                        'maxMessage' => 'la banda no puede tener más de 6 miembros'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Banda::class,
        ]);
    }
}
