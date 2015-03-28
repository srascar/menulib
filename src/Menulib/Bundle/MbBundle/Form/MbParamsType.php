<?php
/*
 * This file is part of the Menulib package.
 *
 * (c) Sylvain Rascar <sylvain.rascar@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Menulib\Bundle\MbBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MbParamsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $now = new \DateTime();
        $builder
            ->add('selected_template_day', 'text', ['data' => "day/7"])
            ->add('first_day', 'date', ['data' => $now->getTimestamp(), 'input' => 'timestamp'])
            ->add('person_count', 'integer', ['data' => 2])
            ->add(
                'repas_type_dejeuner',
                'choice',
                [
                    'choices' => [
                        'ENTREE_PLAT_DESSERT' => "Entrée, Plat, Dessert",
                        'ENTREE_PLAT'         => "Entrée et Plat",
                        'PLAT_DESSERT'        => "Plat et Dessert",
                    ]
                ]
            )
            ->add(
                'repas_type_diner',
                'choice',
                [
                    'choices' => [
                        'ENTREE_PLAT_DESSERT' => "Entrée, Plat, Dessert",
                        'ENTREE_PLAT'         => "Entrée et Plat",
                        'PLAT_DESSERT'        => "Plat et Dessert",
                    ]
                ]
            )
            ->add('day_type', 'choice',
                [
                    'choices' => [
                        'MIDI_SOIR' => "Midi et soir",
                        'MIDI'         => "Midi",
                        'SOIR'        => "Soir",
                    ]
                ])
            ->add('express', 'checkbox', ['required' => false])
            ->add('porc', 'checkbox', ['required' => false]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'mb_param';
    }
}