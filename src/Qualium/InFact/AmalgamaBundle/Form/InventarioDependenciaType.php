<?php

namespace Qualium\InFact\AmalgamaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InventarioDependenciaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idInventario')
            ->add('idInventarioRequerido')
            ->add('razon')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qualium\InFact\AmalgamaBundle\Entity\InventarioDependencia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'qualium_infact_amalgamabundle_inventariodependencia';
    }
}
