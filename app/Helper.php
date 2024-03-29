<?php
/**
 * User: Lessmore92
 * Date: 3/9/2024
 * Time: 2:04 PM
 */

namespace App;

class Helper
{
    /**
     * @param $file_name
     * @return Vehicle[]
     */
    public static function loadVehicles($file_name = 'vehicles.json'): array
    {
        $vehicles = json_decode(file_get_contents($file_name), true);

        $vehicleObjects = [];
        foreach ($vehicles as $vehicle)
        {
            $vehicleObjects[] = new Vehicle($vehicle['name'], $vehicle['maxSpeed'], $vehicle['unit']);
        }

        return $vehicleObjects;
    }
}
