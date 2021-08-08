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

    // Return response request to client
    public function getWeather($city)
    {
        $arOptions = array(
            'q' => trim($city),
            'appid' => $this->appid,
        );

        $this->response($this->curl($arOptions, 'https://api.openweathermap.org/data/2.5/weather'));

        return $this->response;
    }

    // Get response from API
    protected function curl($arOptions, $url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($arOptions));

        $response = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return $response;
    }

    // Prepare response
    protected function response($data)
    {
        // round temp
        $temp = round($data['main']['temp'] - 273.15, 0, PHP_ROUND_HALF_UP);
        $feels_like_temp = round($data['main']['feels_like'] - 273.15, 0, PHP_ROUND_HALF_UP);

        // select background image
        if ($data['weather'][0]['id'] > 200 && $data['weather'][0]['id'] < 300) {
            $backgroundImage = '/img/weather-background/thunderstorm.jpg';
        }
        elseif ($data['weather'][0]['id'] > 300 && $data['weather'][0]['id'] < 600) {
            $backgroundImage = '/img/weather-background/rain.jpg';
        }
        elseif ($data['weather'][0]['id'] > 600 && $data['weather'][0]['id'] < 700) {
            $backgroundImage = '/img/weather-background/snow.jpg';
        }
        elseif ($data['weather'][0]['id'] > 700 && $data['weather'][0]['id'] < 800) {
            $backgroundImage = '/img/weather-background/fog.jpg';
        }
        elseif ($data['weather'][0]['id'] > 800 && $data['weather'][0]['id'] < 900) {
            $backgroundImage = '/img/weather-background/clouds.jpg';
        }

        // result
        $response = array(
            'city' => $data['name'],
            'country' => $data['sys']['country'],
            'weather' => array(
                'temp' => $temp,
                'feels_like_temp' => $feels_like_temp,
                'weather_status' => $data['weather'][0]['main'],
            ),
            'images' => array(
                'background' => $backgroundImage,
                'icon' => 'https://openweathermap.org/img/wn/' . $data['weather'][0]['icon'] . '.png'
            ),
            'time' => \App\Location::getInstance()->location['time']
        );

        $this->response = $response;
    }
}