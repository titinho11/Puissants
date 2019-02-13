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
 * @ORM\Table(name="fos_user_admin")
 */
class AdminUser extends User
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}