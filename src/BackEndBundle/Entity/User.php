<?php
// src/AppBundle/Entity/User.php

namespace BackEndBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

     /**
     * @var string
     *
     * @ORM\Column(name="cognom", type="string", length=255)
     */
    private $cognom;

     /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=255)
     */
    private $dni;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

     /**
     * Set image
     *
     * @param string $nom
     *
     * @return user
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

      /**
     * Set cognom
     *
     * @param string $cognom
     *
     * @return user
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get cognom
     *
     * @return string
     */
    public function getCognom()
    {
        return $this->cognom;
    }


         /**
     * Set dni
     *
     * @param string $dni
     *
     * @return user
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }
}