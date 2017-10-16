<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LogRepository")
 */

class Log
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
     * @var \DateTime
     *
     * @ORM\Column(name="timeStamp", type="datetime")
     */
    private $timeStamp;


    /**
     * @var float
     *
     * @ORM\Column(name="current", type="float")
     */
    private $current;

    /**
     * @var float
     *
     * @ORM\Column(name="voltage", type="float")
     */
    private $voltage;

    /**
     * @var float
     *
     * @ORM\Column(name="powerFactor", type="float")
     */
    private $powerFactor;





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
     * Set timeStamp
     *
     * @param \DateTime $timeStamp
     *
     * @return Log
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;

        return $this;
    }

    /**
     * Get timeStamp
     *
     * @return \DateTime
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * Set current
     *
     * @param float $current
     *
     * @return Log
     */
    public function setCurrent($current)
    {
        $this->$current = $current;

        return $this;
    }

    /**
     * Get current
     *
     * @return float
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Set power2
     *
     * @param float voltage
     *
     * @return Log
     */
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;

        return $this;
    }

    /**
     * Get voltage
     *
     * @return float
     */
    public function getVoltage()
    {
        return $this->voltage;
    }

    /**
     * Set powerFactor
     *
     * @param float $powerFactor
     *
     * @return Log
     */
    public function setPowerFactor($powerFactor)
    {
        $this->powerFactor = $powerFactor;

        return $this;
    }

    /**
     * Get power3
     *
     * @return float
     */
    public function getPowerFactor()
    {
        return $this->powerFactor;
    }


}
