<?php

class Forecast{
	
	private $api_key;

    private $endpoint = 'https://api.forecast.io/forecast/';

    public $descriptions = array(
        'clear-day',
        'clear-night',
        'rain',
        'snow',
        'sleet',
        'wind',
        'fog',
        'cloudy',
        'partly-cloudy-day',
        'partly-cloudy-night',
    );

    public function __construct($api_key){
		 $this->api_key=$api_key;
	}


    public function call($latitude, $longitude, $time = null, $exclude = null, $units = 'si'){
        $url = $this->endpoint . $this->api_key . '/' . $latitude . ',' . $longitude . ($time ? ',' . $time : '') . '?units=' . $units . ($exclude ? '&exclude=' . $exclude : '');
        return json_decode(file_get_contents($url));
    }

}
