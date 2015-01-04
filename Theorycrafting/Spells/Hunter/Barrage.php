<?php

/**
 * Barrage theorycrafting, source: Wowhead.
 *
 * Main Target Formula: Mainhand weapon min damage * 0.6 * 16
 * Additional Target Formula: Mainhand weapon min damage * 0.6 * 8
 *
 * Last Updated: 31/12/2014
 *
 * @version v6.0.3
 */
class Barrage extends Spell
{
    /**
     * Calculates the damage to primary target.
     *
     * @param integer $weapon_min_damage The minimum weapon damage shown on the weapon tooltip.
     *
     * @return bool|int
     */
    public function calculatePrimaryDamage($weapon_min_damage)
    {
        if (!is_int($weapon_min_damage)) {
            return false;
        }
        return (($weapon_min_damage * 0.6) * 16);
    }

    /**
     * Calculates the damage to secondary target(s)
     *
     * @param integer $weapon_min_damage The minimum weapon damage shown on the weapon tooltip.
     * @param integer $targets The number of secondary targets to calculate damage for.
     *
     * @return bool|int
     */
    public function calculateSecondaryDamage($weapon_min_damage, $targets)
    {
        if (!is_int($targets) || !is_int($weapon_min_damage)) {
            return false;
        }
        return ((($weapon_min_damage * 0.6) * 8) * $targets);
    }
}
