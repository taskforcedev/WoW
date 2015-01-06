<?php

abstract class ApiRequestable
{
    protected $api_key;
    public $region;
    public $locale;
    public $base_api_url;

    /**
     * Region, locale and key can be defined in constructor or can be set via setters (whichever is preferred).
     * @param null $region
     * @param null $locale
     * @param null $api_key
     */
    public function __construct($region = null, $locale = null, $api_key = null)
    {
        if (isset($region)) {
        	$this->region = $region;
        	$this->base_api_url = 'https://' . $region . '.api.battle.net/';
        }
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
        $this->base_api_url = 'https://' . $region . '.api.battle.net/';
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
     * Adds locale and api_key to request url and fields if they are set.
     * 
     * @param string $url Base url to work with.
     * @param array|string|null $fields Any extra fields to request
     * 
     * @return string $url
     */
    protected function buildRequest($url, $fields = null)
    {
        $url .= '?locale=' . $this->locale;
        $url .= '&api_key=' . $this->api_key;
        
        if ($fields !== null) {
            $url .= $this->buildFields($fields);
        }
        
        return $url;
    }

    /**
     * @param array|string $fields A string or an array of fields to request.
     *
     * @return string $fields
     */
    public function buildFields($fields)
    {
    	if ($fields === null) {
    		return '';
    	} else {
            if (is_array($fields)) {
                $fields = implode(",", $fields);
            }
            return $fields;
    	}
    }
}
