<?php

namespace Qualium\InFact\AmalgamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InventarioDependencia
 */
class InventarioDependencia
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idInventario;

    /**
     * @var integer
     */
    private $idInventarioRequerido;

    /**
     * @var string
     */
    private $razon;


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
     * Set idInventario
     *
     * @param integer $idInventario
     * @return InventarioDependencia
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
     * Set idInventarioRequerido
     *
     * @param integer $idInventarioRequerido
     * @return InventarioDependencia
     */
    public function setIdInventarioRequerido($idInventarioRequerido)
    {
        $this->idInventarioRequerido = $idInventarioRequerido;

        return $this;
    }

    /**
     * Get idInventarioRequerido
     *
     * @return integer 
     */
    public function getIdInventarioRequerido()
    {
        return $this->idInventarioRequerido;
    }

    /**
     * Set razon
     *
     * @param string $razon
     * @return InventarioDependencia
     */
    public function setRazon($razon)
    {
        $this->razon = $razon;

        return $this;
    }

    /**
     * Get razon
     *
     * @return string 
     */
    public function getRazon()
    {
        return $this->razon;
    }
}
