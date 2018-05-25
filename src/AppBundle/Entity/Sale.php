<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraint as AcmeAssert;

/**
 * Sale
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleRepository")
 */
class Sale
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     * 
     * 
     */
    private $email;
    
   
    /**
     * @var \Date
     *
     * @ORM\Column(name="datereservation", type="date")
     * 
     */
    private $datereservation;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="sale", cascade={"persist", "remove"})
     * @ORM\OrderBy({"id" = "ASC"})
     */     
    private $tickets;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visit", type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     * 
     */
    private $visit;

    /**
     * @var bool
     *
     * @ORM\Column(name="typeticket", type="boolean")
     * @Assert\NotBlank()
     */
    private $typeticket;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     * @Assert\Range(
     *     min=1,
     *     max=8,
     * )
     */
    private $quantity;
    


    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->datereservation = new \DateTime();
    }    
     /**
     * add a ticket
     *
     * @param Ticket $ticket
     * @return $this
     */
    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;
        $ticket->setSale($this);
        return $this;
    }

    /**
    * get tickets
     * 
    * @return ArrayCollection
    */
    public function getTickets()
    {
        return $this->tickets;
    }
    /**
    * Get id
    *
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set name
     *
     * @param string $name
     *
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
     * Set surname
     *
     * @param string $surname
     *
     * @return Sale
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
    /**
     * Set email
     *
     * @param string $email
     *
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
     /**
     * Set datereservation
     *
     * @param \DateTime $datereservation
     *
     * @return Sale
     */
    public function setDatereservation($datereservation)
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    /**
     * Get datereservation
     *
     * @return \DateTime
     */
    public function getDatereservation()
    {
        return $this->datereservation;
    }
    /**
     * Set visit
     *
     * @param \DateTime $visit
     *
     * @return Sale
     */
    public function setVisit($visit)
    {
        $this->visit = $visit;

        return $this;
    }

    /**
     * Get visit
     *
     * @return \DateTime
     */
    public function getVisit()
    {
        return $this->visit;
    }

    /**
     * Set typeticket
     *
     * @param boolean $typeticket
     *
     * @return Sale
     */
    public function setTypeticket($typeticket)
    {
        $this->typeticket = $typeticket;

        return $this;
    }

    /**
     * Get typeticket
     *
     * @return bool
     */
    public function getTypeticket()
    {
        return $this->typeticket;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Sale
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}

