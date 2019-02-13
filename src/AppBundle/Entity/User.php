<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

abstract class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @Assert\NotBlank(message="Veuillez entrer votre nom.", groups={"Registration", "Profile"})
     */
    protected $surname;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @Assert\NotBlank(message="Veuillez entrer votre prnénom.", groups={"Registration", "Profile"})
     */
    protected $firstName;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="Veuillez entrer votre numéro de téléphone.", groups={"Registration", "Profile"})
     */
    protected $telephone;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set surname.
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname.
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set telephone.
     *
     * @param int $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone.
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
    
}
