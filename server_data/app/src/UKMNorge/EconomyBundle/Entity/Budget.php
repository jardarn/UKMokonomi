<?php

namespace UKMNorge\EconomyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Budget
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UKMNorge\EconomyBundle\Entity\Repository\BudgetRepository")
 */
class Budget
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
     *
     * @ORM\Column(name="Name", type="string", length=150)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="Owner", type="integer", nullable=true)
     */
    private $owner=0;

	/**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="budget")
     */
    private $projects;

	/**
     * @ORM\OneToMany(targetEntity="SubProject", mappedBy="project")
     */
    private $subProjects;    
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
     * @return Budget
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
     * Set description
     *
     * @param string $description
     * @return Budget
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set owner
     *
     * @param integer $owner
     * @return Budget
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return integer 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set owner object (PublicUser)
     *
     * @param PublicUser $ownerObject
     * @return Budget
     */
    public function setOwnerObject($ownerObject)
    {
        $this->ownerObject = $ownerObject;

        return $this;
    }
    
    /**
     * Get owner object (PublicUser)
     *
     * @return PublicUSer 
     */
    public function getOwnerObject()
    {
        return $this->ownerObject;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projects
     *
     * @param \UKMNorge\EconomyBundle\Entity\Project $projects
     * @return Budget
     */
    public function addProject(\UKMNorge\EconomyBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \UKMNorge\EconomyBundle\Entity\Project $projects
     */
    public function removeProject(\UKMNorge\EconomyBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add subProjects
     *
     * @param \UKMNorge\EconomyBundle\Entity\SubProject $subProjects
     * @return Budget
     */
    public function addSubProject(\UKMNorge\EconomyBundle\Entity\SubProject $subProjects)
    {
        $this->subProjects[] = $subProjects;

        return $this;
    }

    /**
     * Remove subProjects
     *
     * @param \UKMNorge\EconomyBundle\Entity\SubProject $subProjects
     */
    public function removeSubProject(\UKMNorge\EconomyBundle\Entity\SubProject $subProjects)
    {
        $this->subProjects->removeElement($subProjects);
    }

    /**
     * Get subProjects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubProjects()
    {
        return $this->subProjects;
    }
}
