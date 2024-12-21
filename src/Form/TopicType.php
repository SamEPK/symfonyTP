<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Langue;
use App\Entity\Topic;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('contenu')
            ->add('datePublication', null, [
                'widget' => 'single_text',
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
'choice_label' => 'nom',
            ])
            ->add('langue', EntityType::class, [
                'class' => Langue::class,
'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Topic::class,
        ]);
    }
}
