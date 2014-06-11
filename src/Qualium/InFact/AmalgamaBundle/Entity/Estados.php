<?php

namespace Qualium\InFact\AmalgamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estados
 */
class Estados
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
     * @var \DateTime
     */
    private $ftEvento;

    /**
     * @var integer
     */
    private $idUsuario;

    /**
     * @var string
     */
    private $nota;

    /**
     * @var boolean
     */
    private $flagImportante;


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
     * @return Estados
     */
    public function setidTransacciones($idTransacciones)
    {
        $this->idTransacciones = $idTransacciones;

        return $this;
    }

    /**
     * Get idTransacciones
     *
     * @return integer 
     */
    public function getidTransacciones()
    {
        return $this->idTransacciones;
    }

    /**
     * Set idInventario
     *
     * @param integer $idInventario
     * @return Estados
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
     * Set ftEvento
     *
     * @param \DateTime $ftEvento
     * @return Estados
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
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Estados
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
     * Set nota
     *
     * @param string $nota
     * @return Estados
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set flagImportante
     *
     * @param boolean $flagImportante
     * @return Estados
     */
    public function setFlagImportante($flagImportante)
    {
        $this->flagImportante = $flagImportante;

        return $this;
    }

    /**
     * Get flagImportante
     *
     * @return boolean 
     */
    public function getFlagImportante()
    {
        return $this->flagImportante;
    }
}
