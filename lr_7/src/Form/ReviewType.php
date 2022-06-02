<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('textReview', TextareaType::class, [
            'attr' => ['class' => 'form-control', 'maxlength' => '1500', 'type' => 'text', 'id' => 'textReview'],
        ])
        
        ->add('grade', TextType::class, [
            'attr' => ['class' => 'form-control TextareaPost',
                'required',
                'placeholder' => 'Введите оценку', 'id' => 'grade'],
        ])
        ->add('photoReview', FileType::class, [
            'attr' => ['class' => 'main_input_file', 'type' => 'file', 'name' => 'file',
                'accept' => 'image/*'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
