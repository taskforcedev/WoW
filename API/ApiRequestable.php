<?php

abstract class ApiRequestable
{
    protected $api_key;
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
