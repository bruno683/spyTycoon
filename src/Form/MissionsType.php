<?php

namespace App\Form;

use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Missions;
use App\Entity\Planques;
use App\Entity\Skills;
use App\Entity\Targets;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['label' => 'Titre'])
            ->add('codeName')
            ->add('country')
            ->add('description')
            ->add('type')
            ->add('status')
            ->add('startDate')
            ->add('endDate')
            ->add('agents', EntityType::class, [
                'class' => Agents::class,
                'choice_label' => 'lastName',
                'expanded' => false,
                'multiple' => true,
            ])
            ->add('contacts', EntityType::class, [
                'class' => Contacts::class,
                'choice_label' => 'lastName',
                'multiple' => true,
            ])
            ->add('targets', EntityType::class, [
                'class' => Targets::class,
                'choice_label' => 'lastName',
                'multiple' => true,
            ])
            ->add('skill', EntityType::class, [
                'class' => Skills::class,
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}