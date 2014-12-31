<?php

/**
 * Class GlaiveToss
 *
 * Glaive Toss damage theorycrafting, source: Wowhead.
 *
 * @version 6.0.3
 */
class GlaiveToss
{
    public function calculate_primary_damage($attack_power)
    {
        if (!is_int($attack_power)) {
            return false;
        }
        return ((($attack_power * 0.361) * 2) * 4);
    }

    public function calculate_secondary_damage($attack_power, $targets)
    {
        if (!is_int($targets) || !is_int($attack_power)) {
            return false;
        }
        return (($attack_power * 0.361) * 2) * $targets;
    }
}