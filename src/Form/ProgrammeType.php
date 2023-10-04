<?php

namespace App\Form;

use App\Entity\Programme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgrammeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title', TextType::class, [
                'label' => "Titre",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Titre de l'animation"
                ]
            ])
            ->add('Content', TextareaType::class, [
                'label' => "Contenu de l'animation",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Information sur l'animation"
                ]
            ])
            ->add('Date', TextType::class, [
                'label' => "Date de l'animation",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Date de l'animation"
                ],
                'required' => false,
            ])
            ->add('Image', TextType::class, [
                'label' => "Image",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "copier coller URL de l'image. (Non obligatoire)"
                ],
                'required' => false,
            ])
            ->add('Submit', SubmitType::class, [
                'label' => "Envoyer",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Programme::class,
        ]);
    }
}
