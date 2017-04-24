<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * valoracio
 *
 * @ORM\Table(name="valoracio")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\valoracioRepository")
 */
class valoracio
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
     * @var int
     *
     * @ORM\Column(name="idValoracio", type="integer", unique=true)
     */
    private $idValoracio;

    /**
     * @var int
     *
     * @ORM\Column(name="idTraductor", type="integer")
     */
    private $idTraductor;

    /**
     * @var int
     *
     * @ORM\Column(name="puntuacio", type="integer")
     */
    private $puntuacio;

    /**
     * @var int
     *
     * @ORM\Column(name="idUsuariValoracio", type="integer")
     */
    private $idUsuariValoracio;

    /**
     * @var int
     *
     * @ORM\Column(name="idTraduccio", type="integer")
     */
    private $idTraduccio;


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
     * Set idValoracio
     *
     * @param integer $idValoracio
     *
     * @return valoracio
     */
    public function setIdValoracio($idValoracio)
    {
        $this->idValoracio = $idValoracio;

        return $this;
    }

    /**
     * Get idValoracio
     *
     * @return int
     */
    public function getIdValoracio()
    {
        return $this->idValoracio;
    }

    /**
     * Set idTraductor
     *
     * @param integer $idTraductor
     *
     * @return valoracio
     */
    public function setIdTraductor($idTraductor)
    {
        $this->idTraductor = $idTraductor;

        return $this;
    }

    /**
     * Get idTraductor
     *
     * @return int
     */
    public function getIdTraductor()
    {
        return $this->idTraductor;
    }

    /**
     * Set puntuacio
     *
     * @param integer $puntuacio
     *
     * @return valoracio
     */
    public function setPuntuacio($puntuacio)
    {
        $this->puntuacio = $puntuacio;

        return $this;
    }

    /**
     * Get puntuacio
     *
     * @return int
     */
    public function getPuntuacio()
    {
        return $this->puntuacio;
    }

    /**
     * Set idUsuariValoracio
     *
     * @param integer $idUsuariValoracio
     *
     * @return valoracio
     */
    public function setIdUsuariValoracio($idUsuariValoracio)
    {
        $this->idUsuariValoracio = $idUsuariValoracio;

        return $this;
    }

    /**
     * Get idUsuariValoracio
     *
     * @return int
     */
    public function getIdUsuariValoracio()
    {
        return $this->idUsuariValoracio;
    }

    /**
     * Set idTraduccio
     *
     * @param integer $idTraduccio
     *
     * @return valoracio
     */
    public function setIdTraduccio($idTraduccio)
    {
        $this->idTraduccio = $idTraduccio;

        return $this;
    }

    /**
     * Get idTraduccio
     *
     * @return int
     */
    public function getIdTraduccio()
    {
        return $this->idTraduccio;
    }
}

