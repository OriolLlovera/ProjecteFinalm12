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
     * @ORM\ManyToOne(targetEntity="idioma",inversedBy="traduccioparaula")
     * @ORM\JoinColumn(name="idIdioma", referencedColumnName="id")
     */
    private $idIdioma;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Paraula",inversedBy="traduccioparaula")
     * @ORM\JoinColumn(name="idParaula", referencedColumnName="id")
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

    /**
     * Set traduccioparaula
     *
     * @param \BackEndBundle\Entity\traduccioparaula $traduccioparaula
     *
     * @return paraula
     */
    public function setTraduccioparaula(\BackEndBundle\Entity\traduccioparaula $traduccioparaula = null)
    {
        $this->traduccioparaula = $traduccioparaula;

        return $this;
    }

    /**
     * Get traduccioparaula
     *
     * @return \BackEndBundle\Entity\traduccioparaula
     */
    public function getTraduccioparaula()
    {
        return $this->traduccioparaula;
    }

}

