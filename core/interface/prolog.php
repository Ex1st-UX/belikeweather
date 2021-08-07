<?php
// Подключаем классы
$arClasses = array(
    'Weather' => '/core/classes/Weather',
);

include $_SERVER['DOCUMENT_ROOT'] . $arClasses['Weather'] . '.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/core/interface/init.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/core/interface/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/functions.php';