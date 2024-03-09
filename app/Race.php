<?php
/**
 * User: Lessmore92
 * Date: 3/9/2024
 * Time: 12:10 PM
 */

namespace App;

class Race
{
    private $distance;
    /**
     * @var Vehicle[]
     */
    private $vehicles;
    private $results;

    public function __construct($distance, $vehicles)
    {
        $this->distance = $distance;
        $this->vehicles = $vehicles;
        $this->results  = [];
    }

    public function run()
    {
        foreach ($this->vehicles as $index => $vehicle)
        {
            //Calculate the time taken by the vehicle to complete the race
            $time = $this->distance / $vehicle->getSpeed();

            $this->results[] = [
                'player'  => $index + 1,
                'vehicle' => $vehicle->getName(),
                'time'    => $time
            ];
        }

        //Sort the results by time in ascending order
        usort($this->results, function ($a, $b) {
            return $a['time'] >= $b['time'];
        });
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getResult()
    {
        return $this->results;
    }
}
