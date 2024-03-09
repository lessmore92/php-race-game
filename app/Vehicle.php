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

    public function __construct($name, $speed)
    {
        $this->name  = $name;
        $this->speed = $speed;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
}
