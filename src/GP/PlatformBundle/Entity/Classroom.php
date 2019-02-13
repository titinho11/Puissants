<?php

namespace GP\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classroom
 *
 * @ORM\Table(name="classroom")
 * @ORM\Entity(repositoryClass="GP\PlatformBundle\Repository\ClassroomRepository")
 */
class Classroom
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
     * @ORM\Column(name="group_name", type="string", length=30, nullable=true)
     */
    private $groupName;

    /**
     * @ORM\ManyToOne(targetEntity="GP\PlatformBundle\Entity\Sector")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sector;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_date", type="datetime")
     */
    private $addDate;

    public function __construct()
    {
      $this->addDate = new \Datetime();
    }



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
     * Set groupName.
     *
     * @param string|null $groupName
     *
     * @return Classroom
     */
    public function setGroupName($groupName = null)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName.
     *
     * @return string|null
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Set level.
     *
     * @param int $level
     *
     * @return Classroom
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set addDate.
     *
     * @param \DateTime $addDate
     *
     * @return Classroom
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate.
     *
     * @return \DateTime
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set sector.
     *
     * @param \GP\PlatformBundle\Entity\Sector $sector
     *
     * @return Classroom
     */
    public function setSector(\GP\PlatformBundle\Entity\Sector $sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector.
     *
     * @return \GP\PlatformBundle\Entity\Sector
     */
    public function getSector()
    {
        return $this->sector;
    }

    public function getName()
    {
        return $this->level."".$this->sector->getSectorCode()."-".$this->groupName;
    }
}
