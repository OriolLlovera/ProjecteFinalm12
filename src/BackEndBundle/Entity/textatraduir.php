<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}

