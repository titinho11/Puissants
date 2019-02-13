<?php

namespace GP\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="sector")
 * @ORM\Entity(repositoryClass="GP\PlatformBundle\Repository\SectorRepository")
 */
class Sector
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
     * @ORM\Column(name="sector_name", type="string", length=50, unique=true)
     */
    private $sectorName;

    /**
     * @var string
     *
     * @ORM\Column(name="sector_code", type="string", length=5, unique=true)
     */
    private $sectorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="course_description", type="string", length=500)
     */


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sectorName.
     *
     * @param string $sectorName
     *
     * @return Sector
     */
    public function setSectorName($sectorName)
    {
        $this->sectorName = $sectorName;

        return $this;
    }

    /**
     * Get sectorName.
     *
     * @return string
     */
    public function getSectorName()
    {
        return $this->sectorName;
    }

    /**
     * Set sectorCode.
     *
     * @param string $sectorCode
     *
     * @return Sector
     */
    public function setSectorCode($sectorCode)
    {
        $this->sectorCode = $sectorCode;

        return $this;
    }

    /**
     * Get sectorCode.
     *
     * @return string
     */
    public function getSectorCode()
    {
        return $this->sectorCode;
    }

    public function toString()
    {
        return $this->sectorCode;
    }
}
