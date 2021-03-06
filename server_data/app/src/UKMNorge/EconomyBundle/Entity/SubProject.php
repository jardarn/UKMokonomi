<?php

namespace UKMNorge\EconomyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubProject
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UKMNorge\EconomyBundle\Entity\Repository\SubProjectRepository")
 */
class SubProject
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
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;
    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="subProjects")
     * @ORM\JoinColumn(name="Project", referencedColumnName="id")
     */
    private $project;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Budget", inversedBy="subProjects")
     * @ORM\JoinColumn(name="Budget", referencedColumnName="id")
     */
    private $budget;

	/**
     * @ORM\OneToMany(targetEntity="SubProjectAllocatedAmount", mappedBy="subProject")
     */
    private $allocatedAmounts;

	private $allocatedAmountsArray = false;
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
     * @return SubProject
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
     * @return SubProject
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
     * Constructor
     */
    public function __construct()
    {
        $this->allocatedAmounts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add allocatedAmounts
     *
     * @param \UKMNorge\EconomyBundle\Entity\SubProjectAllocatedAmount $allocatedAmounts
     * @return SubProject
     */
    public function addAllocatedAmount(\UKMNorge\EconomyBundle\Entity\SubProjectAllocatedAmount $allocatedAmounts)
    {
        $this->allocatedAmounts[] = $allocatedAmounts;
	    $this->allocatedAmountsArray = false;
        return $this;
    }

    /**
     * Remove allocatedAmounts
     *
     * @param \UKMNorge\EconomyBundle\Entity\SubProjectAllocatedAmount $allocatedAmounts
     */
    public function removeAllocatedAmount(\UKMNorge\EconomyBundle\Entity\SubProjectAllocatedAmount $allocatedAmounts)
    {
        $this->allocatedAmounts->removeElement($allocatedAmounts);
	    $this->allocatedAmountsArray = false;
    }

    /**
     * Get allocatedAmounts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAllocatedAmounts()
    {
        return $this->allocatedAmounts;
    }
    
    /**
     * Set allocatedAmountsArray
     *
     * @return void
     */
    public function setAllocatedAmountsArray( $array ) {
	    $this->allocatedAmountsArray = $array;
    }
    
    /**
     * Get allocatedAmountsArray
     *
     * @return Array
     */
    public function getAllocatedAmountsArray() {
	    return $this->allocatedAmountsArray;
    }
    
    /**
     * Get allocatedAmount
     * 
     * @param integer $year
     *
     * @return integer $amount
     */

    public function getAllocatedAmount( $year ) {

	    // If not loaded, load now
	    if( $this->allocatedAmountsArray == false ) {
		    $allocatedAmounts = $this->getAllocatedAmounts();
			foreach( $allocatedAmounts as $entity ) {
				$this->allocatedAmountsArray[ $entity->getYear() ] = $entity->getAmount();
			}
		}
		// If there is set an amount for given year, return
	    if( isset( $this->allocatedAmountsArray[ $year ] ) ) {
		    return $this->allocatedAmountsArray[ $year ];
	    }
	    // If none allocated, zero it is
	    return 0;
    }

    /**
     * Set project
     *
     * @param \UKMNorge\EconomyBundle\Entity\Project $project
     * @return SubProject
     */
    public function setProject(\UKMNorge\EconomyBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \UKMNorge\EconomyBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set budget
     *
     * @param \UKMNorge\EconomyBundle\Entity\Budget $budget
     * @return SubProject
     */
    public function setBudget(\UKMNorge\EconomyBundle\Entity\Budget $budget = null)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return \UKMNorge\EconomyBundle\Entity\Budget 
     */
    public function getBudget()
    {
        return $this->budget;
    }
}
