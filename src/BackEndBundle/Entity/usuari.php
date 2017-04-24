<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * usuari
 *
 * @ORM\Table(name="usuari")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\usuariRepository")
 */
class usuari
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
     * @ORM\Column(name="dni", type="string", length=255, unique=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="cognom1", type="string", length=255)
     */
    private $cognom1;

    /**
     * @var string
     *
     * @ORM\Column(name="cognom2", type="string", length=255)
     */
    private $cognom2;

    /**
     * @var string
     *
     * @ORM\Column(name="correu", type="string", length=255)
     */
    private $correu;

    /**
     * @var int
     *
     * @ORM\Column(name="numTraduccions", type="integer")
     */
    private $numTraduccions;

    /**
     * @var int
     *
     * @ORM\Column(name="rol", type="integer")
     */
    private $rol;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return usuari
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return usuari
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set cognom1
     *
     * @param string $cognom1
     *
     * @return usuari
     */
    public function setCognom1($cognom1)
    {
        $this->cognom1 = $cognom1;

        return $this;
    }

    /**
     * Get cognom1
     *
     * @return string
     */
    public function getCognom1()
    {
        return $this->cognom1;
    }

    /**
     * Set cognom2
     *
     * @param string $cognom2
     *
     * @return usuari
     */
    public function setCognom2($cognom2)
    {
        $this->cognom2 = $cognom2;

        return $this;
    }

    /**
     * Get cognom2
     *
     * @return string
     */
    public function getCognom2()
    {
        return $this->cognom2;
    }

    /**
     * Set correu
     *
     * @param string $correu
     *
     * @return usuari
     */
    public function setCorreu($correu)
    {
        $this->correu = $correu;

        return $this;
    }

    /**
     * Get correu
     *
     * @return string
     */
    public function getCorreu()
    {
        return $this->correu;
    }

    /**
     * Set numTraduccions
     *
     * @param integer $numTraduccions
     *
     * @return usuari
     */
    public function setNumTraduccions($numTraduccions)
    {
        $this->numTraduccions = $numTraduccions;

        return $this;
    }

    /**
     * Get numTraduccions
     *
     * @return int
     */
    public function getNumTraduccions()
    {
        return $this->numTraduccions;
    }

    /**
     * Set rol
     *
     * @param integer $rol
     *
     * @return usuari
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return int
     */
    public function getRol()
    {
        return $this->rol;
    }
}

