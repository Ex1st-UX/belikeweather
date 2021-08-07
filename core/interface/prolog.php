<?php
// Подключаем классы
$arClasses = array(
    'Weather' => '/core/classes/Weather',
    'Location' => '/core/classes/Location'
);

include $_SERVER['DOCUMENT_ROOT'] . $arClasses['Weather'] . '.php';
include $_SERVER['DOCUMENT_ROOT'] . $arClasses['Location'] . '.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/core/interface/init.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/core/interface/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/functions.php';