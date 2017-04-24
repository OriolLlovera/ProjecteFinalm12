<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * contacte
 *
 * @ORM\Table(name="contacte")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\contacteRepository")
 */
class contacte
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
     * @ORM\Column(name="idcontacte", type="integer")
     */
    private $idcontacte;

    /**
     * @var int
     *
     * @ORM\Column(name="idusuari", type="integer")
     */
    private $idusuari;

    /**
     * @var int
     *
     * @ORM\Column(name="idmissatgeria", type="integer")
     */
    private $idmissatgeria;


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
     * Set idcontacte
     *
     * @param integer $idcontacte
     *
     * @return contacte
     */
    public function setIdcontacte($idcontacte)
    {
        $this->idcontacte = $idcontacte;

        return $this;
    }

    /**
     * Get idcontacte
     *
     * @return int
     */
    public function getIdcontacte()
    {
        return $this->idcontacte;
    }

    /**
     * Set idusuari
     *
     * @param integer $idusuari
     *
     * @return contacte
     */
    public function setIdusuari($idusuari)
    {
        $this->idusuari = $idusuari;

        return $this;
    }

    /**
     * Get idusuari
     *
     * @return int
     */
    public function getIdusuari()
    {
        return $this->idusuari;
    }

    /**
     * Set idmissatgeria
     *
     * @param integer $idmissatgeria
     *
     * @return contacte
     */
    public function setIdmissatgeria($idmissatgeria)
    {
        $this->idmissatgeria = $idmissatgeria;

        return $this;
    }

    /**
     * Get idmissatgeria
     *
     * @return int
     */
    public function getIdmissatgeria()
    {
        return $this->idmissatgeria;
    }
}

