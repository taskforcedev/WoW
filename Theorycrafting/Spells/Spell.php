<?php

abstract class Spell
{
	public function calculateTotalDamage($stat, $targets = 1)
	{
		if (!is_int($targets)) {
			throw new InvalidArgumentException("Targets should be an integer");
		}
		$damage = $this->calculatePrimaryDamage($stat);
        if ($targets > 1) {
            $damage += $this->calculateSecondaryDamage($stat, ($targets - 1));
        }
        return $damage;
	}

	abstract public function calculatePrimaryDamage($stat);
	abstract public function calculateSecondaryDamage($stat, $targets);
}
