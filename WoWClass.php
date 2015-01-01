<?php

/**
 * Provides helper functionality for converting api id's from battle.net api into human understandable terms.
 * @version v6.0.3
 */
class WoWClass
{
    /**
     * Get the textual representation of a characters class
     *
     * @param integer $class_id The id of the class from the wow api
     *
     * @throws Exception
     *
     * @return string The class name (Capitalized Words)
     */
    public function getClassName($class_id)
    {
        switch ($class_id) {
            case 1:
                $class = "Warrior";
                break;
            case 2:
                $class = "Paladin";
                break;
            case 3:
                $class = "Hunter";
                break;
            case 4:
                $class = "Rogue";
                break;
            case 5:
                $class = "Priest";
                break;
            case 6:
                $class = "Death Knight";
                break;
            case 7:
                $class = "Shaman";
                break;
            case 8:
                $class = "Mage";
                break;
            case 9:
                $class = "Warlock";
                break;
            case 10:
                $class = "Monk";
                break;
            case 11:
                $class = "Druid";
                break;
            default:
                $class = $class_id;
                throw new Exception("Class {$class} not found - likely we need to update API");
                break;
        }
        return $class;
    }

    /**
     * Converts human formatted names into css classes.
     *
     * @param string $class_name The name of the class with capitals words.
     *
     * @return string The lower case display name
     */
    public function getDisplayName($class_name)
    {
        if ($class_name == 'Death Knight') {
            $display_class = 'death_knight';
        } else {
            $display_class = lcfirst($class_name);
        }
        return $display_class;
    }

    /**
     * Gets the css color code given a class name or id.
     *
     * @param string|integer $identifier Either the class id eg: 1, or classs name eg: "Death Knight".
     *
     * @return string The hex color code for the class.
     *
     * @throws Exception
     */
    public function getClassColor($identifier)
    {
        if (strlen($identifier) > 2) {
            $class_name = $identifier;
        } elseif (is_int($identifier)) {
            $class_name = $this->getClassName($identifier);
        } else {
            $class_name = $this->getClassName($identifier);
        }
        switch ($class_name) {
            case "Warrior":
                $color = '#C79C6E';
                break;
            case "Paladin":
                $color = '#F58CBA';
                break;
            case "Hunter":
                $color = '#ABD473';
                break;
            case "Rogue":
                $color = '#FFF569';
                break;
            case "Priest":
                $color = '#FFFFFF';
                break;
            case "Death Knight":
                $color = '#C41F3B';
                break;
            case "Shaman":
                $color = '#0070DE';
                break;
            case "Mage":
                $color = '#69CCF0';
                break;
            case "Warlock":
                $color = '#9482C9';
                break;
            case "Monk":
                $color = '#00FF96';
                break;
            case "Druid":
                $color = '#FF7D0A';
                break;
            default:
                $color = '#FFFFFF';
                break;
        }
        return $color;
    }
}