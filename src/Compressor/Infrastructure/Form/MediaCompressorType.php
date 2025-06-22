<?php

namespace App\Compressor\Infrastructure\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaCompressorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('command', TextareaType::class, options: [
                'label' => false,
            ])
            ->add('media', FileType::class, options: [
                'label' => false,
                'multiple' => true,
            ])
        ;
    }
}
