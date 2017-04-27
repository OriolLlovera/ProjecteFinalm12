<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * texttraduit
 *
 * @ORM\Table(name="texttraduit")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\texttraduitRepository")
 */
class texttraduit
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
     * @ORM\Column(name="idTextATraduir", type="integer")
     */
    private $idTextATraduir;

    /**
     * @var int
     *
     * @ORM\Column(name="idUsuari", type="integer")
     */
    private $idUsuari;

    /**
     * @var string
     *
     * @ORM\Column(name="textTraduit", type="string", length=255, unique=true)
     */
    private $textTraduit;


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
     * Set idTextATraduir
     *
     * @param integer $idTextATraduir
     *
     * @return texttraduit
     */
    public function setIdTextATraduir($idTextATraduir)
    {
        $this->idTextATraduir = $idTextATraduir;

        return $this;
    }

    /**
     * Get idTextATraduir
     *
     * @return int
     */
    public function getIdTextATraduir()
    {
        return $this->idTextATraduir;
    }

    /**
     * Set idUsuari
     *
     * @param integer $idUsuari
     *
     * @return texttraduit
     */
    public function setIdUsuari($idUsuari)
    {
        $this->idUsuari = $idUsuari;

        return $this;
    }

    /**
     * Get idUsuari
     *
     * @return int
     */
    public function getIdUsuari()
    {
        return $this->idUsuari;
    }

    /**
     * Set textTraduit
     *
     * @param string $textTraduit
     *
     * @return texttraduit
     */
    public function setTextTraduit($textTraduit)
    {
        $this->textTraduit = $textTraduit;

        return $this;
    }

    /**
     * Get textTraduit
     *
     * @return string
     */
    public function getTextTraduit()
    {
        return $this->textTraduit;
    }
}

