<?php

namespace App\Form;
use App\Entity\Klienci;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class KlienciType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $i=0;
        $j=0;
        $builder
            ->add('Imie')
            ->add('RodzajUslugi')
            ->add('DataGodzina',DateType::class,[
                'days'=>[(int)date('d'),$i++],
                'months'=>[(int)date('m'),$j++],
                'years'=>[2022,2023],
            ]) //datetime
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
