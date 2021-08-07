<?php

namespace App;

class Weather
{
    private static $instance;

    protected $appid = 'f49581d81a8703d43634b48d809f35c0';
    protected $response = array();

    private function __construct()
    {

    }

    protected function __clone()
    {

    }

    // Return class object
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getWeather($city)
    {
        $arOptions = array(
            'q' => trim($city),
            'appid' => $this->appid,
        );

        $this->response =  $this->curl($arOptions, 'https://api.openweathermap.org/data/2.5/weather');

        return $this->response;
    }

    protected function curl($arOptions, $url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($arOptions));

        $response = curl_exec($ch);

        curl_close($ch);
        
        return $response;
    }
}