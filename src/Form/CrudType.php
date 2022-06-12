<?php

namespace App\Form;

use App\Entity\Klienci;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Imie')
            ->add('RodzajUslugi')
            ->add('DataGodzina')
            ->add('NumerTelefonu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Klienci::class,
        ]);
    }
}
