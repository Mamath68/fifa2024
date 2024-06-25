<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Player;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('poste')
            ->add('biographie')
            ->add('pied')
            ->add('born_at', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('lieu_de_naissance')
            ->add('pays_de_naissance')
            ->add('taille')
            ->add('image')
            ->add('club', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'name',
                'multiple' => true,
                'autocomplete' => true,
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
