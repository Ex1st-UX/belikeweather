<?php

use App\Weather;

include $_SERVER['DOCUMENT_ROOT'] . "/core/interface/prolog.php";

// Get instanse
$Weather = Weather::getInstance();

echo $Weather->getWeather($_REQUEST['city']);