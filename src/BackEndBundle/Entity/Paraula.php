<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="catgramatical",inversedBy="paraula")
     * @ORM\JoinColumn(name="categoriaGramatical", referencedColumnName="id")
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

    

}

