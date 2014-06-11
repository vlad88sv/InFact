<?php

namespace Qualium\InFact\AmalgamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transacciones
 */
class Transacciones
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idUsuario;

    /**
     * @var \DateTime
     */
    private $ftEvento;

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
     * Set idInventario
     *
     * @param integer $idInventario
     * @return Transacciones
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
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Transacciones
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set ftEvento
     *
     * @param \DateTime $ftEvento
     * @return Transacciones
     */
    public function setFtEvento($ftEvento)
    {
        $this->ftEvento = $ftEvento;

        return $this;
    }

    /**
     * Get ftEvento
     *
     * @return \DateTime 
     */
    public function getFtEvento()
    {
        return $this->ftEvento;
    }

    /**
     * Set notas
     *
     * @param string $notas
     * @return Transacciones
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
