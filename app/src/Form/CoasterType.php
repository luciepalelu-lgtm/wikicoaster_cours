<?php

namespace App\Form;

use App\Entity\Coaster;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoasterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('maxSpeed')
            ->add('length')
            ->add('maxHeight')
            ->add('operating')
            ->add('save',SubmitType::class,['label' => 'Enregistrer',])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coaster::class,
        ]);
    }
}
