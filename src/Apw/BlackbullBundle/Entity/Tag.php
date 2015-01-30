<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Task", inversedBy="tags")
     * @ORM\JoinTable(name="tag_task")
     */
    private $task;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set task
     *
     * @param \Apw\BlackbullBundle\Entity\Task $task
     * @return Tag
     */
    public function setTask(\Apw\BlackbullBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \Apw\BlackbullBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add task
     *
     * @param \Apw\BlackbullBundle\Entity\Task $task
     * @return Tag
     */
    public function addTask(\Apw\BlackbullBundle\Entity\Task $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \Apw\BlackbullBundle\Entity\Task $task
     */
    public function removeTask(\Apw\BlackbullBundle\Entity\Task $task)
    {
        $this->task->removeElement($task);
    }
}
