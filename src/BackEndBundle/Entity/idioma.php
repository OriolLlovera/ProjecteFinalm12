<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * idioma
 *
 * @ORM\Table(name="idioma")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\idiomaRepository")
 */
class idioma
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


    /**
    * @ORM\OneToMany(targetEntity="traduccioparaula", mappedBy="idioma")
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
     * Set nom
     *
     * @param string $nom
     *
     * @return idioma
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

