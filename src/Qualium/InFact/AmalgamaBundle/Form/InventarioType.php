<?php

namespace Qualium\InFact\AmalgamaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InventarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoBarra', null, array('label' => 'Codigo de barra'))
            ->add('nombre', null, array('label' => 'Nombre de articulo'))
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('fechaCompra', null, array('label' => 'Fecha de compra/ingreso'))
            ->add('flagRestriccion', null, array('label' => 'Estado restringido','required' => false))
            ->add('flagDescontinuado', null, array('label' => 'Articulo descontinuado','required' => false))
            ->add('idPropietario', null, array('label' => 'Propietario'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qualium\InFact\AmalgamaBundle\Entity\Inventario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'qualium_infact_amalgamabundle_inventario';
    }
}
