<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Paraula
 *
 * @ORM\Table(name="paraula")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\paraulaRepository")
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
     * @ORM\Column(name="categoriaGramatical", type="string", length=255)
     */
    private $categoriaGramatical;

    /**
     * @var string
     *
     * @ORM\Column(name="categoriaFamilia", type="string", length=255)
     */
    private $categoriaFamilia;

    /**
     * @var string
     *
     * @ORM\Column(name="definicio", type="string", length=255)
     */
    private $definicio;

    /**
    * @ORM\OneToMany(targetEntity="traduccioparaula", mappedBy="paraula")
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
     * @return Paraula
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
     * Constructor
     */
    public function __construct()
    {
        $this->traduccioparaula = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id_paraula
     *
     * @param \exchangeIt\BackEndBundle\Entity\traduccioparaula $id_paraula
     *
     * @return id_paraula
     */
    public function setIdParaula(\exchangeIt\BackEndBundle\Entity\traduccioparaula $id_paraula = null)
    {
        $this->traduccioparaula = $id_paraula;

        return $this;
    }

    

}

