<?php

/**
 * Provides helper functionality for converting api id's from battle.net api into human understandable terms.
 * @version v6.0.3
 */
class WoWClass
{
    /**
     * Holds data relating to the classes
     */
    public $class_data;
    
    public function __construct()
    {
        $this->class_data = [
            1 => ['class' => 'Warrior', 'color' => '#C79C6E'],
            2 => ['class' => 'Paladin', 'color' => '#F58CBA'],
            3 => ['class' => 'Hunter', 'color' => '#ABD473'],
            4 => ['class' => 'Rogue', 'color' => '#FFF569'],
            5 => ['class' => 'Priest', 'color' => '#FFFFFF'],
            6 => ['class' => 'Death Knight', 'color' => '#C41F3B'],
            7 => ['class' => 'Shaman', 'color' => '#0070DE'],
            8 => ['class' => 'Mage', 'color' => '#69CCF0'],
            9 => ['class' => 'Warlock', 'color' => '#9482C9'],
            10 => ['class' => 'Monk', 'color' => '#00FF96'],
            11 => ['class' => 'Druid', 'color' => '#FF7D0A'],
        ];
    }
    
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
        return $this->class_data[$class_id]['class']
    }
    
    /**
     * Get the numeric identifier of a characters class from it's human readable name
     * ie 'Death Knight'
     *
     * @param string $class_name The capitalized human-readable class name.
     * 
     * @return null|int $class_id
     */
    public function getClassId($class_name)
    {
        foreach($this->class_data as $id => $data) {
            $class = $data['class'];
            if ($class == $class_name) {
                return $id;
            }
        }
        return null;
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
        /* Convert to class id if a string is passed in */
        if (is_string($identifier)) {
            $identifier = $this->getClassId($identifier);
        }
        
        $color = $this->class_data[$identifier]['color'];
        
        return $color;
    }
}
