<?php
/**
 * User: Lessmore92
 * Date: 3/9/2024
 * Time: 12:10 PM
 */

namespace App;

class Game
{
    public static function start()
    {
        $vehicles = \App\Helper::loadVehicles();

        CLIUtil::line("Welcome to the %Y%4PHP Racing Game!%n");
        CLIUtil::line('Please select a vehicle for each player from the list below:');

        //Display the list of available vehicles
        foreach ($vehicles as $index => $vehicle)
        {
            CLIUtil::line(($index + 1) . ". " . $vehicle->getName() . " - " . $vehicle->getSpeedInKmH() . " km/h");
        }

        $distance = CLIUtil::promptNumber('%YWhat is the distance of the race track?%n', 1000, 100, 200);
        $player1  = CLIUtil::promptNumber('%CPlayer 1, enter the number of your vehicle%n', count($vehicles), 1);
        $player2  = CLIUtil::promptNumber('%BPlayer 2, enter the number of your vehicle%n', count($vehicles), 1);

        //Get the selected vehicles
        $selectedVehicles   = [];
        $selectedVehicles[] = $vehicles[$player1 - 1];
        $selectedVehicles[] = $vehicles[$player2 - 1];


        $race = new Race($distance, $selectedVehicles);

        //Run the race
        $race->run();
        $results = $race->getResult();


        //Display the race results
        CLIUtil::line("\n\nThe race distance is %Y%4{$race->getDistance()} km%n");
        CLIUtil::line("The race results are:\n");
        foreach ($results as $index => $result)
        {
            //Display the rank, vehicle name, and time
            CLIUtil::line("Place " . ($index + 1) . ": Player " . $result['player'] . " (" . $result['vehicle'] . ") - " . round($result['time'], 2) . " hours");
        }

        //Display the winner
        CLIUtil::line("\n\n%GThe winner is Player " . $results[0]['player'] . " (" . $results[0]['vehicle'] . ")!%n");
    }
}
