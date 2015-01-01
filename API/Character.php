<?php

/**
 * Helper class for interaction with blizzard wow character api's.
 *
 * @version v2015.01.01
 */
class Character
{
    public $api_key;
    public $region;
    public $locale;

    /**
     * Region, locale and key can be defined in constructor or can be set via setters (whichever is preferred).
     * @param null $region
     * @param null $locale
     * @param null $api_key
     */
    public function __construct($region = null, $locale = null, $api_key = null)
    {
        if (isset($region)) { $this->region = $region; }
        if (isset($locale)) { $this->locale = $locale; }
        if (isset($api_key)) { $this->api_key = $api_key; }
    }

    /**
     * Set the locale (language) to request data in.
     *
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Set the region for the API to interact with.
     *
     * @param $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Set your key for the battle.net API.
     *
     * @param $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * Helper method for retrieving character info.
     *
     * To use this simply implement your method of requesting the data and parsing the return (we use guzzle but are keeping the git generic).
     *
     * @param string $character The name of the character to retrieve - this may need to be url encoded.
     * @param string $server The name of the server on which the character resides. - this may need to be url encoded.
     * @param array|string $fields The character fields to retrieve, either an array or comma seperated string.
     *
     * @return string $url;
     */
    public function getCharacterApiUrl($character, $server, $fields = null)
    {
        $url = "https://{$this->region}.api.battle.net/wow/character/{$server}/{$character}";

        $url .= "?locale=" . $this->locale;
        $url .= "&api_key=" . $this->api_key;

        if ($fields !== null) {
            $url .= "&fields=";
            if (is_array($fields)) {
                $fields = implode(",", $fields);
            }
            $url .= $fields;
        }

        return $url;
    }


}