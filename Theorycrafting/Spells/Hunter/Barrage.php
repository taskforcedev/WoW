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
    /**
     * Calculates the total damage done given a number of targets
     * @param $weapon_min_damage
     * @param int $targets Defaults to one.
     * @return bool|int
     */
    public function calculate_total_damage($weapon_min_damage, $targets = 1)
    {
        $damage = $this->calculate_primary_damage($weapon_min_damage);
        if ($targets > 1) {
            $damage += $this->calculate_secondary_damage($weapon_min_damage, ($targets - 1));
        }
        return $damage;
    }

    /**
     * Calculates the damage to primary target.
     * @param $weapon_min_damage
     * @return bool|int
     */
    public function calculate_primary_damage($weapon_min_damage)
    {
        if (!is_int($weapon_min_damage)) {
            return false;
        }
        return (($weapon_min_damage * 0.6) * 16);
    }

    /**
     * Calculates the damage to secondary target(s);
     * @param $weapon_min_damage
     * @param integer $targets The number of secondary targets to calculate damage for.
     * @return bool|int
     */
    public function calculate_secondary_damage($weapon_min_damage, $targets)
    {
        if (!is_int($targets) || !is_int($weapon_min_damage)) {
            return false;
        }
        return ((($weapon_min_damage * 0.6) * 8) * $targets);
    }
}