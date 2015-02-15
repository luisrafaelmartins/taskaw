<?php
/*
loads the autoload file
*/
//ini_set("display_errors","0");
//error_reporting(0);
$appConfig = include($_SERVER['DOCUMENT_ROOT'].'config/app.php');
include_once($_SERVER['DOCUMENT_ROOT'].'start/autoload.php');


foreach ($appConfig["paths"] as $paths) {
	\Autoload::iterateDirectory($paths);
}

include_once($_SERVER['DOCUMENT_ROOT'].'vendor/autoload.php');

