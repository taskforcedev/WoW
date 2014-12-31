<?php

/**
 * Class to determine a players potential raid buffs.
 * Currently works with primary stats only.
 *
 *
 * @version v6.0.3
 */
class Buffs
{
    /**
     * Calculates Primary Stat buffs (Int, Agi, Etc).
     * @param $primaryType
     * @param bool $theoretical_max
     * @return int
     */
    public function calculatePrimaryBuffs($primaryType, $theoretical_max = true)
    {
        $buff = $this->flasks($primaryType);
        $buff += $this->food_buff($primaryType);

        if ($theoretical_max) {
            $other = $this->theoretical_other($primaryType);
            $buff += $other;
        }

        return $buff;
    }

    public function food_buff($primaryType)
    {
        switch ($primaryType) {
            case "Stamina":
                $amt = 150;
                break;
            default:
                $amt = 100; // Int, Str, Agi
                break;
        }
        return $amt;
    }

    public function flasks($primaryType)
    {
        switch ($primaryType) {
            case "Stamina":
                $amt = 375;
                break;
            default:
                $amt = 250; // Int, Str, Agi
                break;
        }
        return $amt;
    }

    /**
     * Used to calculate theoretical top dps (although is not practical in every fight).
     * @param $primaryType
     * @return integer $amt
     */
    public function theoretical_other($primaryType)
    {
        $other = $this->augment_rune($primaryType);
        return $other;
    }

    /**
     * Augment Runes can be farmed in raids such as LFR, but are relatively rare.  Their buff is also removed on death.
     * @param $primaryType
     * @return int
     */
    public function augment_rune($primaryType)
    {
        if ($primaryType == "Stamina") {
            return 0;
        } else {
            return 50;
        }
    }
}