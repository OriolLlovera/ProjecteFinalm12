<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * catfamilia
 *
 * @ORM\Table(name="catfamilia")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\catfamiliaRepository")
 */
class catfamilia
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
     * @ORM\Column(name="idCatFamilia", type="integer", unique=true)
     */
    private $idCatFamilia;

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
     * Set idCatFamilia
     *
     * @param integer $idCatFamilia
     *
     * @return catfamilia
     */
    public function setIdCatFamilia($idCatFamilia)
    {
        $this->idCatFamilia = $idCatFamilia;

        return $this;
    }

    /**
     * Get idCatFamilia
     *
     * @return int
     */
    public function getIdCatFamilia()
    {
        return $this->idCatFamilia;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return catfamilia
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

