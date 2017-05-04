<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Paraula
 *
 * @ORM\Table(name="paraula")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\ParaulaRepository")
 */
class Paraula
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
     * @ORM\Column(name="paraula", type="string", length=255, unique=true)
     */
    private $paraula;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="catgramatical",inversedBy="paraula")
     * @ORM\JoinColumn(name="categoriaGramatical", referencedColumnName="id")
     */
    private $categoriaGramatical;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="catfamilia",inversedBy="paraula")
     * @ORM\JoinColumn(name="categoriaFamilia", referencedColumnName="id")
     */
    private $categoriaFamilia;

    /**
     * @var string
     *
     * @ORM\Column(name="definicio", type="string", length=255)
     */
    private $definicio;

    /**
    * @ORM\OneToMany(targetEntity="Paraula", mappedBy="traduccioparaula")
    */
    protected $traduccioparaula;
    public function __constructor() {
        $this->traduccioparaula = new ArrayCollection();
    }

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
     * Set paraula
     *
     * @param string $paraula
     *
     * @return paraula
     */
    public function setParaula($paraula)
    {
        $this->paraula = $paraula;

        return $this;
    }

    /**
     * Get paraula
     *
     * @return string
     */
    public function getParaula()
    {   
        return $this->paraula;
    }

    /**
     * Set categoriaGramatical
     *
     * @param string $categoriaGramatical
     *
     * @return Paraula
     */
    public function setCategoriaGramatical($categoriaGramatical)
    {
        $this->categoriaGramatical = $categoriaGramatical;

        return $this;
    }

    /**
     * Get categoriaGramatical
     *
     * @return string
     */
    public function getCategoriaGramatical()
    {
        return $this->categoriaGramatical;
    }

    /**
     * Set categoriaFamilia
     *
     * @param string $categoriaFamilia
     *
     * @return Paraula
     */
    public function setCategoriaFamilia($categoriaFamilia)
    {
        $this->categoriaFamilia = $categoriaFamilia;

        return $this;
    }

    /**
     * Get categoriaFamilia
     *
     * @return string
     */
    public function getCategoriaFamilia()
    {
        return $this->categoriaFamilia;
    }

    /**
     * Set definicio
     *
     * @param string $definicio
     *
     * @return Paraula
     */
    public function setDefinicio($definicio)
    {
        $this->definicio = $definicio;

        return $this;
    }

    /**
     * Get definicio
     *
     * @return string
     */
    public function getDefinicio()
    {
        return $this->definicio;
    }


    /**
     * Set categoriaGramatical
     *
     * @param \BackEndBundle\Entity\catgramatical $categoriaGramatical
     *
     * @return paraula
     */
    public function setCatgramatical(\BackEndBundle\Entity\catgramatical $categoriaGramatical = null)
    {
        $this->categoriaGramatical = $categoriaGramatical;

        return $this;
    }

    /**
     * Get categoriaGramatical
     *
     * @return \BackEndBundle\Entity\catgramatical
     */
    public function getCatgramatical()
    {
        return $this->categoriaGramatical;
    }

    /**
     * Set categoriaFamilia
     *
     * @param \BackEndBundle\Entity\catfamilia $categoriaFamilia
     *
     * @return paraula
     */
    public function setCatfamilia(\BackEndBundle\Entity\catfamilia $categoriaFamilia = null)
    {
        $this->categoriaFamilia = $categoriaFamilia;

        return $this;
    }

    /**
     * Get categoriaFamilia
     *
     * @return \BackEndBundle\Entity\catfamilia
     */
    public function getCatfamilia()
    {
        return $this->categoriaFamilia;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->traduccioparaula = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add traduccioparaula
     *
     * @param \BackEndBundle\Entity\traduccioparaula $traduccioparaula
     *
     * @return traduccioparaula
     */
    public function addTraduccioparaula(\BackEndBundle\Entity\traduccioparaula $traduccioparaula)
    {
        $this->traduccioparaula[] = $traduccioparaula;

        return $this;
    }

    /**
     * Remove traduccioparaula
     *
     * @param \BackEndBundle\Entity\traduccioparaula $traduccioparaula
     */
    public function removeTraduccioparaula(\BackEndBundle\Entity\traduccioparaula $traduccioparaula)
    {
        $this->traduccioparaula->removeElement($traduccioparaula);
    }

    /**
     * Get traduccioparaula
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTraduccioparaula()
    {
        return $this->traduccioparaula;
    }

}

