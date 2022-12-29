<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserreservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('isAllergy', CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check-input mt-4 ms-4',
                ],
                'required' => false,
                'label' => 'Une personne est-elle allergique?',
                'label_attr' => [
                    'class' => 'form-check-label mt-4'
                ]
            ])
            
            ->add('date', DateType::class, [
                'placeholder' => [
                'year' => 'Année',  'day' => 'Jour','month' => 'Mois'
                ],
                
                'label' => 'Date de la réservation',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                'format' => 'dd-MM-yyyy',
                
            ])
            ->add('client_number', NumberType::class, array(
             'scale' => 0,
            'attr' => array(
             "min" => 0,
            "scale" => 0,
            "step" => 1,
            "placeholder" => "0",
            ),
            'label' => 'Indiquer le nombre de personnes',
            'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
            ))
            ->add('time', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Indiquer l\'horaire',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}