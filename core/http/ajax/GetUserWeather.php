<?php

use App\Location,
    App\Weather;

include $_SERVER['DOCUMENT_ROOT'] . "/core/interface/prolog.php";

$Location = Location::getInstance();

$Location->getUserWeather('81.23.183.155');
$userData = $Location->location;

$Weather = Weather::getInstance();
$userWeather = $Weather->getWeather($userData['city']['name_en']);

echo $userWeather;