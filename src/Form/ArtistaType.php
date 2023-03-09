<?php

namespace App\Form;

use App\Entity\Artista;
use App\Entity\Banda;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre',
                'required' => true
            ])
            ->add('apellidos', TextType::class, [
                'label' => 'Apellidos',
                'required' => false
            ])
            ->add('alias', TextType::class,[
                'label' => 'Alias',
                'required' => false
            ])
            ->add('fechaNacimiento', DateType::class, [
                'label' => 'Fecha Nacimiento',
                'required' => true
                ])
            ->add('pais', TextType::class,[
                'label' => 'País',
                'required' => true
            ])
            ->add('compositor', CheckboxType::class, [
                'label' => '¿Es compositor?',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artista::class,
        ]);
    }
}
