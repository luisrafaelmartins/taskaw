<?php

/**
 * Tests for the Autoloader
 */
use \task\controllers\ReportController;
class AutoLoaderTest extends \PHPUnit_Framework_TestCase
{
    /**
    *
    * Tests for the correct functioning of the autoload
     */
    public function testReportController()
    {

        $reportController = new ReportController;
        $reportController->getReport("data.csv","1");
        $this->assertInstanceOf(ReportController::class, $reportController);
    }
}
