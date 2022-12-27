<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Option;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Nom du menu',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('options', EntityType::class, [
                'class' => Option::class,                
                'label' => 'Merci de sélectionner vos formules',
                'label_attr' => [
                    'class' => 'form-label mt-4 '
                ],
                'choice_label' => 'description',
                'multiple' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'd-flex justify-content-between',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}