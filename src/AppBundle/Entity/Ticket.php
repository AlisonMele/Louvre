<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
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
    * @ORM\ManyToOne(targetEntity="Sale", inversedBy="tickets")
    * @ORM\JoinColumn(name="sale_id", referencedColumnName="id")
    */
    private $sale;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $surname;
    /**
     * @var \DateTime
     * @ORM\Column(name="birth", type="date")
     * @Assert\Date()
     */
    private $birth;

    /**
     * @var array
     *
     * @ORM\Column(name="country", type="simple_array")
     * @Assert\Country()
     */
    private $country;
    /*
     * @var int
     * 
     * @ORM\Column(name="price", type="integer")
     */
    private $price;
    
    

    /**
    * Set Sale
    */
    public function setSale(Sale $sale)
    {
      $this->sale = $sale;
    }
 
    /**
    *
    */
    public function getSale()
    {
      return $this->sale;
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
     * @return Ticket
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
     * @return Ticket
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
     * Set birth
     *
     * @param \DateTime $birth
     *
     * @return Ticket
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set country
     *
     * @param array $country
     *
     * @return Ticket
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return array
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    
    }
     /**
     * Set price
     *
     * @param integer $price
     *
     * @return Ticket
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
    
    
}

