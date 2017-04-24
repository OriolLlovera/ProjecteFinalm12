<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="idCatGramatical", type="integer", unique=true)
     */
    private $idCatGramatical;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


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
     * Set idCatGramatical
     *
     * @param integer $idCatGramatical
     *
     * @return catgramatical
     */
    public function setIdCatGramatical($idCatGramatical)
    {
        $this->idCatGramatical = $idCatGramatical;

        return $this;
    }

    /**
     * Get idCatGramatical
     *
     * @return int
     */
    public function getIdCatGramatical()
    {
        return $this->idCatGramatical;
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
}

