<?php

namespace OSG\ArduinosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Arduino
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OSG\ArduinosBundle\Entity\ArduinoRepository")
 */
class Arduino
{
    
    /*
    * @OneToMany(targetEntity="Device" mappedBy="product")
    */
    public $devices;

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
    * @ORM\Column(name="name", type="string")
    */
    private $name;
    /**
     * Get id
     *
     * @return integer 
     */

    /**
    * @var string
    * @ORM\Column(name="ip_address", type="string")
    */

    private $ip_address;

    public function __construct() {
        $this->devices = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Arduino
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
     * Set ip_address
     *
     * @param string $ipAddress
     * @return Arduino
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }
}
