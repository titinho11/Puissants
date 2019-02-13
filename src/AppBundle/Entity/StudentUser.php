<?php
/**
 * Created by PhpStorm.
 * User: NDEM
 * Date: 2/12/2019
 * Time: 3:19 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_student")
 */
class StudentUser extends User
{

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    protected $selfDescription;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     *
     * @Assert\NotBlank(message="Veuillez entrer votre matricule.", groups={"Registration", "Profile"})
     */
    protected $matricule;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set selfDescription.
     *
     * @param string|null $selfDescription
     *
     * @return User
     */
    public function setSelfDescription($selfDescription = null)
    {
        $this->selfDescription = $selfDescription;

        return $this;
    }

    /**
     * Get selfDescription.
     *
     * @return string|null
     */
    public function getSelfDescription()
    {
        return $this->selfDescription;
    }

    /**
     * Set matricule.
     *
     * @param string $matricule
     *
     * @return User
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule.
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }
    
}