<?php
/**
 * Barrage.php
 *
 * Used to theorycraft hunter damage for spell 'Barrage'
 *
 * @see http://www.wowhead.com/spell=120360/barrage
 *
 * @version 6.0.3
 */

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
     *
     * @param integer $weapon_min_damage The minimum weapon damage shown on the weapon tooltip.
     * @param int $targets Defaults to one.
     *
     * @throws InvalidArgumentException
     *
     * @return bool|int
     *
     * @link http://www.wowhead.com/spell=120360/barrage Wowhead spell page.
     */
    public function calculate_total_damage($weapon_min_damage, $targets = 1)
    {
        if (!is_int($weapon_min_damage) || !is_int($targets)) {
            throw new InvalidArgumentException("One of the fields supplied was not a valid integer");
        }
        $damage = $this->calculate_primary_damage($weapon_min_damage);
        if ($targets > 1) {
            $damage += $this->calculate_secondary_damage($weapon_min_damage, ($targets - 1));
        }
        return $damage;
    }

    /**
     * Calculates the damage to primary target.
     *
     * @param integer $weapon_min_damage The minimum weapon damage shown on the weapon tooltip.
     *
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
     * Calculates the damage to secondary target(s)
     *
     * @param integer $weapon_min_damage The minimum weapon damage shown on the weapon tooltip.
     * @param integer $targets The number of secondary targets to calculate damage for.
     *
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