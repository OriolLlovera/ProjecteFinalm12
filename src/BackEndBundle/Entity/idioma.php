<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="idIdioma", type="integer", unique=true)
     */
    private $idIdioma;

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
     * Set idIdioma
     *
     * @param integer $idIdioma
     *
     * @return idioma
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
}

