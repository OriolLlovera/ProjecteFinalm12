<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * traduccioparaula
 *
 * @ORM\Table(name="traduccioparaula")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\traduccioparaulaRepository")
 */
class traduccioparaula
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
     * @ORM\Column(name="idIdioma", type="integer")
     */
    private $idIdioma;

    /**
     * @var int
     *
     * @ORM\Column(name="idParaula", type="integer")
     */
    private $idParaula;


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
     * Set idIdioma
     *
     * @param integer $idIdioma
     *
     * @return traduccioparaula
     */
    public function setIdIdioma($idIdioma)
    {
        $this->idIdioma = $idIdioma;

        return $this;
    }

    /**
     * Get idIdioma
     *
     * @return int
     */
    public function getIdIdioma()
    {
        return $this->idIdioma;
    }

    /**
     * Set idParaula
     *
     * @param integer $idParaula
     *
     * @return traduccioparaula
     */
    public function setIdParaula($idParaula)
    {
        $this->idParaula = $idParaula;

        return $this;
    }

    /**
     * Get idParaula
     *
     * @return int
     */
    public function getIdParaula()
    {
        return $this->idParaula;
    }
}

