<?php

namespace CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="CursoBundle\Repository\EmpresaRepository")
 */
class Empresa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=128, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=128)
     */
    private $ciudad;

    /**
     * @var int
     *
     * @ORM\Column(name="numEmpleados", type="integer")
     */
    private $numEmpleados;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Empresa
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
     * Set ciudad
     *
     * @param string $ciudad
     * @return Empresa
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set numEmpleados
     *
     * @param integer $numEmpleados
     * @return Empresa
     */
    public function setNumEmpleados($numEmpleados)
    {
        $this->numEmpleados = $numEmpleados;

        return $this;
    }

    /**
     * Get numEmpleados
     *
     * @return integer 
     */
    public function getNumEmpleados()
    {
        return $this->numEmpleados;
    }
}
