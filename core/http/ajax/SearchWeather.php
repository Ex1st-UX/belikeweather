<?php

use App\Weather;

include $_SERVER['DOCUMENT_ROOT'] . "/core/interface/prolog.php";

// Get instanse
$Weather = Weather::getInstance();

echo json_encode($Weather->getWeather($_REQUEST['city']));