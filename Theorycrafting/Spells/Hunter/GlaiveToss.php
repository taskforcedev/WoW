<?php

/**
 * Class GlaiveToss
 *
 * Glaive Toss damage theorycrafting, source: Wowhead.
 *
 * @version 6.0.3
 * @link http://www.wowhead.com/spell=117050/glaive-toss Wowhead spell page.
 */
class GlaiveToss
{
    /**
     * Calculates the total damage done to all targets
     *
     * @param integer $attack_power The characters attack power.
     * @param integer $targets The number of additional targets.
     *
     * @throws InvalidArgumentException
     *
     * @return bool|int
     */
    public function calculate_total_damage($attack_power, $targets = 1)
    {
        if (!is_int($attack_power) || !is_int($targets)) {
            throw new InvalidArgumentException("One of the fields supplied was not a valid integer");
        }
        $damage = $this->calculate_primary_damage($attack_power);
        if ($targets > 1) {
            $damage += $this->calculate_secondary_damage($attack_power, ($targets - 1));
        }
        return $damage;
    }

    /**
     * Calculates damage against the primary target
     *
     * @param integer $attack_power The characters attack power.
     *
     * @return bool|int The amount of damage or false.
     */
    public function calculate_primary_damage($attack_power)
    {
        if (!is_int($attack_power)) {
            return false;
        }
        return ((($attack_power * 0.361) * 2) * 4);
    }

    /**
     * Calculates damage against secondary targets.
     *
     * @param integer $attack_power The characters attack power.
     * @param integer $targets The number of additional targets.
     *
     * @return bool|int The amount of damage or false.
     */
    public function calculate_secondary_damage($attack_power, $targets)
    {
        if (!is_int($targets) || !is_int($attack_power)) {
            return false;
        }
        return (($attack_power * 0.361) * 2) * $targets;
    }
}