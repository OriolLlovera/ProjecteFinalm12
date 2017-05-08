<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * textatraduir
 *
 * @ORM\Table(name="textatraduir")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\textatraduirRepository")
 */
class textatraduir
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
     * @ORM\Column(name="textOriginal", type="string", length=255)
     */
    private $textOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="idiomaOriginal", type="string", length=255)
     */
    private $idiomaOriginal;


    /**
    * @ORM\OneToMany(targetEntity="texttraduit", mappedBy="textatraduir")
    */
    protected $texttraduit;
    public function __constructor() {
        $this->texttraduit = new ArrayCollection();
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
     * Set textOriginal
     *
     * @param string $textOriginal
     *
     * @return textatraduir
     */
    public function setTextOriginal($textOriginal)
    {
        $this->textOriginal = $textOriginal;

        return $this;
    }

    /**
     * Get textOriginal
     *
     * @return string
     */
    public function getTextOriginal()
    {
        return $this->textOriginal;
    }

    /**
     * Set idiomaOriginal
     *
     * @param string $idiomaOriginal
     *
     * @return textatraduir
     */
    public function setIdiomaOriginal($idiomaOriginal)
    {
        $this->idiomaOriginal = $idiomaOriginal;

        return $this;
    }

    /**
     * Get idiomaOriginal
     *
     * @return string
     */
    public function getIdiomaOriginal()
    {
        return $this->idiomaOriginal;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->texttraduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add texttraduit
     *
     * @param \BackEndBundle\Entity\texttraduit $texttraduit
     *
     * @return texttraduit
     */
    public function addTexttraduit(\BackEndBundle\Entity\texttraduit $texttraduit)
    {
        $this->texttraduit[] = $texttraduit;

        return $this;
    }

    /**
     * Remove texttraduit
     *
     * @param \BackEndBundle\Entity\texttraduit $texttraduit
     */
    public function removeTexttraduit(\BackEndBundle\Entity\texttraduit $texttraduit)
    {
        $this->texttraduit->removeElement($texttraduit);
    }

    /**
     * Get texttraduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTexttraduit()
    {
        return $this->texttraduit;
    }

}

