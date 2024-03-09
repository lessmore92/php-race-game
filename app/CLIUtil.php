<?php
/**
 * User: Lessmore92
 * Date: 3/9/2024
 * Time: 1:13 PM
 */

namespace App;

class CLIUtil
{
    /**
     * @param string $msg
     * @param integer $acceptable_max
     * @param integer $acceptable_min
     * @param mixed $default
     * @param string $marker
     * @param bool $hide
     * @return string
     */
    public static function prompt($msg, $acceptable_max, $acceptable_min = 0, $default = false, $marker = ': ', $hide = false)
    {
        do
        {
            $player1             = \cli\prompt($msg, $default, $marker, $hide);
            $in_acceptable_range = $player1 >= $acceptable_min && $player1 <= $acceptable_max;
            if (!$in_acceptable_range)
            {
                \cli\line("%RPlease enter valid number between $acceptable_min - $acceptable_max%n");
            }
        } while (!$in_acceptable_range);
        return $player1;
    }

    /**
     * @param string $text
     * @return void
     */
    public static function line($text)
    {
        \cli\line($text);
    }
}
