<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * log
 *
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\logRepository")
 */
class log
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
     * @ORM\Column(name="idLog", type="integer", unique=true)
     */
    private $idLog;

    /**
     * @var int
     *
     * @ORM\Column(name="idUsuari", type="integer")
     */
    private $idUsuari;

    /**
     * @var int
     *
     * @ORM\Column(name="idFuncionalitat", type="integer")
     */
    private $idFuncionalitat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;


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
     * Set idLog
     *
     * @param integer $idLog
     *
     * @return log
     */
    public function setIdLog($idLog)
    {
        $this->idLog = $idLog;

        return $this;
    }

    /**
     * Get idLog
     *
     * @return int
     */
    public function getIdLog()
    {
        return $this->idLog;
    }

    /**
     * Set idUsuari
     *
     * @param integer $idUsuari
     *
     * @return log
     */
    public function setIdUsuari($idUsuari)
    {
        $this->idUsuari = $idUsuari;

        return $this;
    }

    /**
     * Get idUsuari
     *
     * @return int
     */
    public function getIdUsuari()
    {
        return $this->idUsuari;
    }

    /**
     * Set idFuncionalitat
     *
     * @param integer $idFuncionalitat
     *
     * @return log
     */
    public function setIdFuncionalitat($idFuncionalitat)
    {
        $this->idFuncionalitat = $idFuncionalitat;

        return $this;
    }

    /**
     * Get idFuncionalitat
     *
     * @return int
     */
    public function getIdFuncionalitat()
    {
        return $this->idFuncionalitat;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return log
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }
}

