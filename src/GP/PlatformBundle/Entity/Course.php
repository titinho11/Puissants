<?php

namespace GP\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="GP\PlatformBundle\Repository\CourseRepository")
 */
class Course
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
     * @ORM\ManyToMany(targetEntity="GP\PlatformBundle\Entity\Classroom")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classrooms;

    /**
     * @var string
     *
     * @ORM\Column(name="course_name", type="string", length=30, nullable=false)
     */
    private $courseName;

    /**
     * @var string
     *
     * @ORM\Column(name="course_description", type="text")
     */
    private $courseDescription;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_date", type="datetime")
     */
    private $addDate;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classrooms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set courseName.
     *
     * @param string $courseName
     *
     * @return Course
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;

        return $this;
    }

    /**
     * Get courseName.
     *
     * @return string
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * Set courseDescription.
     *
     * @param string $courseDescription
     *
     * @return Course
     */
    public function setCourseDescription($courseDescription)
    {
        $this->courseDescription = $courseDescription;

        return $this;
    }

    /**
     * Get courseDescription.
     *
     * @return string
     */
    public function getCourseDescription()
    {
        return $this->courseDescription;
    }

    /**
     * Set price.
     *
     * @param int $price
     *
     * @return Course
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set addDate.
     *
     * @param \DateTime $addDate
     *
     * @return Course
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
     * Add classroom.
     *
     * @param \GP\PlatformBundle\Entity\Classroom $classroom
     *
     * @return Course
     */
    public function addClassroom(\GP\PlatformBundle\Entity\Classroom $classroom)
    {
        $this->classrooms[] = $classroom;

        return $this;
    }

    /**
     * Remove classroom.
     *
     * @param \GP\PlatformBundle\Entity\Classroom $classroom
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClassroom(\GP\PlatformBundle\Entity\Classroom $classroom)
    {
        return $this->classrooms->removeElement($classroom);
    }

    /**
     * Get classrooms.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassrooms()
    {
        return $this->classrooms;
    }
}

/**
TODO
 * controller et methode des formulaire de creation et d edition
 * Test creation et edition de ces entitees
 * Bonne vue de creation et d edition de ces entitees
 * gestion de l'authorisation de creation et edition de ces entitees

 **/
