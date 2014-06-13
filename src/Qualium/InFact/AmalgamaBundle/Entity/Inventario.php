<?php

namespace Qualium\InFact\AmalgamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventario
 */
class Inventario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoBarra;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $idPropietario;

    /**
     * @var \DateTime
     */
    private $fechaCompra;

    /**
     * @var boolean
     */
    private $flagRestriccion;

    /**
     * @var boolean
     */
    private $flagDescontinuado;

    /**
     * @var integer
     */
    private $cantidadDisponible;

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
     * Set codigoBarra
     *
     * @param string $codigoBarra
     * @return Inventario
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get codigoBarra
     *
     * @return string 
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Inventario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Inventario
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set idPropietario
     *
     * @param integer $idPropietario
     * @return Inventario
     */
    public function setIdPropietario($idPropietario)
    {
        $this->idPropietario = $idPropietario;

        return $this;
    }

    /**
     * Get idPropietario
     *
     * @return integer 
     */
    public function getIdPropietario()
    {
        return $this->idPropietario;
    }

    /**
     * Set fechaCompra
     *
     * @param \DateTime $fechaCompra
     * @return Inventario
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;

        return $this;
    }

    /**
     * Get fechaCompra
     *
     * @return \DateTime 
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Set flagRestriccion
     *
     * @param boolean $flagRestriccion
     * @return Inventario
     */
    public function setFlagRestriccion($flagRestriccion)
    {
        $this->flagRestriccion = $flagRestriccion;

        return $this;
    }

    /**
     * Get flagRestriccion
     *
     * @return boolean 
     */
    public function getFlagRestriccion()
    {
        return $this->flagRestriccion;
    }

    /**
     * Set flagDescontinuado
     *
     * @param boolean $flagDescontinuado
     * @return Inventario
     */
    public function setFlagDescontinuado($flagDescontinuado)
    {
        $this->flagDescontinuado = $flagDescontinuado;

        return $this;
    }

    /**
     * Get flagDescontinuado
     *
     * @return boolean 
     */
    public function getFlagDescontinuado()
    {
        return $this->flagDescontinuado;
    }
    
    /**
     * Set cantidadDisponible
     *
     * @param integer $cantidadDisponible
     * @return Inventario
     */
    public function setCantidadDisponible($cantidadDisponible)
    {
        $this->cantidadDisponible = $cantidadDisponible;

        return $this;
    }

    /**
     * Get cantidadDisponible
     *
     * @return integer 
     */
    public function getcantidadDisponible()
    {
        return $this->cantidadDisponible;
    }
    
    public function __toString() {
        return $this->getNombre();
    }
}
