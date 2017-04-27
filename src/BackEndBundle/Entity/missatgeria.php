<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * missatgeria
 *
 * @ORM\Table(name="missatgeria")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\missatgeriaRepository")
 */
class missatgeria
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
     * @ORM\Column(name="idUsuariOrigen", type="integer")
     */
    private $idUsuariOrigen;

    /**
     * @var int
     *
     * @ORM\Column(name="idUsuariDesti", type="integer")
     */
    private $idUsuariDesti;

    /**
     * @var string
     *
     * @ORM\Column(name="missatge", type="string", length=255)
     */
    private $missatge;

    /**
     * @var bool
     *
     * @ORM\Column(name="llegit", type="boolean")
     */
    private $llegit;


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
     * Set idUsuariOrigen
     *
     * @param integer $idUsuariOrigen
     *
     * @return missatgeria
     */
    public function setIdUsuariOrigen($idUsuariOrigen)
    {
        $this->idUsuariOrigen = $idUsuariOrigen;

        return $this;
    }

    /**
     * Get idUsuariOrigen
     *
     * @return int
     */
    public function getIdUsuariOrigen()
    {
        return $this->idUsuariOrigen;
    }

    /**
     * Set idUsuariDesti
     *
     * @param integer $idUsuariDesti
     *
     * @return missatgeria
     */
    public function setIdUsuariDesti($idUsuariDesti)
    {
        $this->idUsuariDesti = $idUsuariDesti;

        return $this;
    }

    /**
     * Get idUsuariDesti
     *
     * @return int
     */
    public function getIdUsuariDesti()
    {
        return $this->idUsuariDesti;
    }

    /**
     * Set missatge
     *
     * @param string $missatge
     *
     * @return missatgeria
     */
    public function setMissatge($missatge)
    {
        $this->missatge = $missatge;

        return $this;
    }

    /**
     * Get missatge
     *
     * @return string
     */
    public function getMissatge()
    {
        return $this->missatge;
    }

    /**
     * Set llegit
     *
     * @param boolean $llegit
     *
     * @return missatgeria
     */
    public function setLlegit($llegit)
    {
        $this->llegit = $llegit;

        return $this;
    }

    /**
     * Get llegit
     *
     * @return bool
     */
    public function getLlegit()
    {
        return $this->llegit;
    }
}

