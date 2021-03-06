<?php

/**
 * Helper class for interaction with blizzard wow guild api's.
 *
 * @version v2015.01.01
 */
class Guild extends ApiRequestable
{
    /**
     * Helper method for retrieving guild info.
     *
     * To use this simply implement your method of requesting the data and parsing the return (we use guzzle but are keeping the git generic).
     *
     * @param string $guild The name of the guild to retrieve - this will need to be url encoded.
     * @param string $server The name of the server on which the character resides. - this may need to be url encoded.
     * @param array|string $fields The character fields to retrieve, either an array or comma seperated string.
     *
     * @return string $url;
     */
    public function getGuildApiUrl($guild, $server, $fields = null)
    {
        $url = $this->base_api_url . "wow/guild/{$server}/{$guild}";
        return $this->buildRequest($url, $fields);
    }
}
