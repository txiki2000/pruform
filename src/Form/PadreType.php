<?php

namespace App\Form;

use App\Form\HijosType;
use App\Entity\Tablamae;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PadreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('aceptar', SubmitType::class, ['label'=>'Aceptar'])
            ->add('cancelar', ResetType::class, ['label'=>'Cancelar'])
        ;
        $builder->add('hijos', CollectionType::class,
        array( 
                'entry_type'    => HijosType::class,
                'entry_options' => ['label' => false]));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tablamae::class,
        ]);
    }
}
