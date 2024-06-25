<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Division;
use App\Entity\Player;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('city')
            ->add('country')
            ->add('created_at', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('division', EntityType::class, [
                'class' => Division::class,
                'choice_label' => 'name',
                'multiple' => false,
                'autocomplete' => true,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
