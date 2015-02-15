<?php
/*
loads the bootstrap file
*/

include_once('bootstrap.php');
use \task\controllers\ReportController;

if (count($argv) == 3){
	$reportController = new ReportController;
	$reportController->getReport($argv[1],$argv[2]);

}else{
	die("Invalid number of parameters");
	
}
