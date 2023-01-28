<?php

namespace App\Form;
use App\Entity\Klienci;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\Type;
class KlienciType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('Imie')
            ->add('RodzajUslugi')
            ->add('DataGodzina', DateTimeType::class, [
                'hours' => [7,8,9,10,11,12,13,14,15,16,17],
                'minutes'=>[0,15,30,45],
            ])
            ->add('NumerTelefonu',NumberType::class)
            
              ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Klienci::class,
        ]);
    }
}
