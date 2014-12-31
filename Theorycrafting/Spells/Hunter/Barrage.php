<?php

/**
 * Class Barrage
 *
 * Barrage theorycrafting, source: Wowhead.
 *
 * Main Target Formula: Mainhand weapon min damage * 0.6 * 16
 * Additional Target Formula: Mainhand weapon min damage * 0.6 * 8
 *
 * Last Updated: 31/12/2014
 *
 * @version 6.0.3
 */
class Barrage
{
    public function calculate_primary_damage($weapon_min_damage)
    {
        if (!is_int($weapon_min_damage)) {
            return false;
        }
        return (($weapon_min_damage * 0.6) * 16);
    }

    public function calculate_secondary_damage($weapon_min_damage, $targets)
    {
        if (!is_int($targets) || !is_int($weapon_min_damage)) {
            return false;
        }
        return ((($weapon_min_damage * 0.6) * 8) * $targets);
    }
}