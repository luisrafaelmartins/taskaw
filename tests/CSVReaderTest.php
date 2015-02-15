<?php

/**
 * Tests for load data from csv
 */
use \task\helpers\CSVReader;
class CSVReaderTest extends \PHPUnit_Framework_TestCase
{
    /**
    *
    * Tests for the correct functioning of the loading headers from the CSV
     */
    public function testReportHeader()
    {

        $file = new CSVReader("data.csv");
        $file->readFile();

    	$header = $file->getHeaders();
        $this->assertNotEmpty($header);
    }

    /**
    *
    * Tests for the correct functioning of the loading content from the CSV
     */
    public function testReportContent()
    {
        $file = new CSVReader("data.csv");
        $file->readFile();
        $content = $file->getContent();
        $this->assertNotEmpty($content);
    }
}
