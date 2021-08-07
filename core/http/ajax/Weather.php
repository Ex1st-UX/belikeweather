<?php

use App\Weather;

include $_SERVER['DOCUMENT_ROOT'] . "/core/interface/prolog.php";

$Weather = Weather::getInstance();

$data = array(
    'date' => $_REQUEST['date'],
    'city' => $_REQUEST['city']
);

echo json_encode($Weather->getWeather($data));