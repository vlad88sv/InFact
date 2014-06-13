<?php

namespace Qualium\InFact\AmalgamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransaccionesDetalle
 */
class TransaccionesDetalle
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idTransacciones;

    /**
     * @var integer
     */
    private $idInventario;

    /**
     * @var integer
     */
    private $cantidad;
    
    /**
     * @var string
     */
    private $notas;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idTransacciones
     *
     * @param integer $idTransacciones
     * @return TransaccionesDetalle
     */
    public function setIdTransacciones($idTransacciones)
    {
        $this->idTransacciones = $idTransacciones;

        return $this;
    }

    /**
     * Get idTransacciones
     *
     * @return integer 
     */
    public function getIdTransacciones()
    {
        return $this->idTransacciones;
    }

    /**
     * Set idInventario
     *
     * @param integer $idInventario
     * @return TransaccionesDetalle
     */
    public function setIdInventario($idInventario)
    {
        $this->idInventario = $idInventario;

        return $this;
    }

    /**
     * Get idInventario
     *
     * @return integer 
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }
    
    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Transacciones
     */
    public function setcantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getcantidad()
    {
        return $this->cantidad;
    }


    /**
     * Set notas
     *
     * @param string $notas
     * @return TransaccionesDetalle
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get notas
     *
     * @return string 
     */
    public function getNotas()
    {
        return $this->notas;
    }
}
