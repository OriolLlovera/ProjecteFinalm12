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
    * @ORM\OneToMany(targetEntity="Paraula", mappedBy="idioma")
    */
    protected $Paraula;
    public function __constructor() {
        $this->Paraula = new ArrayCollection();
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
        $this->Paraula = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Paraula
     *
     * @param \exchangeIt\BackEndBundle\Entity\Paraula $Paraula
     *
     * @return idioma
     */
    public function addVehicle(\exchangeIt\BackEndBundle\Entity\Paraula $vehicle)
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    /**
     * Remove Paraula
     *
     * @param \exchangeIt\BackEndBundle\Entity\Paraula $Paraula
     */
    public function removeVehicle(\exchangeIt\BackEndBundle\Entity\Paraula $Paraula)
    {
        $this->Paraula->removeElement($Paraula);
    }

    /**
     * Get Paraules
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParaules()
    {
        return $this->Paraula;
    }
}

