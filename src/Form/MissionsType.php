<?php

namespace App\Form;

use App\Entity\Agents;
use App\Entity\Missions;
use App\Repository\AgentsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
                'class' => Agents::class, 'query_builder' => function (AgentsRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.lastName', 'DESC');
                },
                'choice_label' => 'lastName',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}