<?php

/**
 * Helper class for interaction with blizzard wow character api's.
 *
 * @version v2015.01.01
 */
class Character extends ApiRequestable
{

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
            $url .= $this->buildFields($fields);
        }
        
        return $url;
    }
}
