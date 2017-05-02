<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * catgramatical
 *
 * @ORM\Table(name="catgramatical")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\catgramaticalRepository")
 */
class catgramatical
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
    * @ORM\OneToMany(targetEntity="Paraula", mappedBy="catgramatical")
    */
    protected $paraula;
    public function __constructor() {
        $this->paraula = new ArrayCollection();
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
     * @return catgramatical
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
        $this->paraula = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Paraula
     *
     * @param \BackEndBundle\Entity\paraula $paraula
     *
     * @return catgramatical
     */
    public function addParaula(\BackEndBundle\Entity\paraula $paraula)
    {
        $this->paraula[] = $paraula;

        return $this;
    }

    /**
     * Remove Paraula
     *
     * @param \BackEndBundle\Entity\paraula $paraula
     */
    public function removeParaula(\BackEndBundle\Entity\paraula $paraula)
    {
        $this->paraula->removeElement($paraula);
    }

    /**
     * Get Paraula
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParaula()
    {
        return $this->paraula;
    }

    

}

