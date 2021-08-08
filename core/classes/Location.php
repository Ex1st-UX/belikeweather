<?php


namespace App;


class Location
{
    private static $instance;

    public $location = array();
    public $ip;

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

    public function getUserWeather($ip)
    {
        session_start();

        // cache result
        if (empty($_SESSION['user_weather'])) {
            $this->ip = $ip;

            $_SESSION['user_weather'] = $this->getCity($ip);
        }

        // Make time
        $utc = $_SESSION['user_weather']['region']['utc'] . ':00';
        date_default_timezone_set('UTC');

        $timeNow = date('H:i');
        $timeLocation = strtotime($timeNow) + strtotime($utc);

        $this->location = array(
            'city' => array(
                'name_ru' => $_SESSION['user_weather']['city']['name_ru'],
                'name_en' => $_SESSION['user_weather']['city']['name_en']
            ),
            'country' => array(
                'name_ru' => $_SESSION['user_weather']['country']['name_ru'],
                'name_en' => $_SESSION['user_weather']['country']['name_en']
            ),
            'time' => date('H:i', $timeLocation)
        );
        
        return $_SESSION['user_weather'];
    }

    protected function getCity($ip)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'api.sypexgeo.net/json/' . $ip);

        $response = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return $response;
    }
}