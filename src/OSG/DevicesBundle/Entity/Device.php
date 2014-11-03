<?php

namespace OSG\DevicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OSG\ArduinosBundle\Entity\Arduino as Arduino;
/**
 * Device
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OSG\DevicesBundle\Entity\DeviceRepository")
 */
class Device
{

    /**
    * @ORM\ManyToOne(targetEntity="OSG\ArduinosBundle\Entity\Arduino", inversedBy="devices")
    * @ORM\JoinColumn(name="arduino_id", referencedColumnName="id")
    */
    private $arduino;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * @return Device
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

    // /**
    //  * Set arduino
    //  *
    //  * @param \OSG\ArduinoBundle\Entity\Arduino $arduino
    //  * @return \OSG\ArduinosBundle\EntityArduino
    //  */
    // public function setArduino(\OSG\DevicesBundle\Entity\Arduino $arduino = null)
    // {
    //     // $this->arduino = $arduino;

    //     return $this;
    // }

    /**
     * Get arduino
     *
     * @return \OSG\DevicesBundle\Entity\Arduino 
     */
    public function getArduino()
    {
        return $this->arduino;
    }
}
