<?php
/**
 * User: Lessmore92
 * Date: 3/9/2024
 * Time: 12:09 PM
 */

namespace App;

class Vehicle
{
    private $name;
    private $speed;
    private $speed_unit;

    public function __construct($name, $speed, $speed_unit)
    {
        $this->name       = $name;
        $this->speed      = $speed;
        $this->speed_unit = $speed_unit;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getSpeedUnit()
    {
        return $this->speed_unit;
    }

    public function getSpeedInKmH()
    {
        return strtolower($this->getSpeedUnit()) == 'km/h' ? $this->speed : $this->speed * 1.852;
    }
}
