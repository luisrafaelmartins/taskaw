<?php

/**
 * Tests currencies
 */
use \task\models\CurrencyWebservice;
use \task\models\CurrencyConverter;
class CurrencyTest extends PHPUnit_Framework_TestCase
{
    /**
    *
    * Tests for the correct functioning of the currency symbol
    *
    */
    public function testCurrencyConverterSymbol()
    {

        $currency = new CurrencyConverter;
        $symbol = $currency->getCurrencySymbol();
		$this->assertEquals(chr(163) , $symbol);
    }

    /**
    *
    * Tests for the correct functioning of the currency symbol
    *
    */
    public function testCurrencyConverterValues()
    {

        $currency = new CurrencyConverter;
        $value = 100.5;
		$price = $currency->getExchangeRateBySymbol(163) * $value;
		$this->assertNotEmpty($price);
    }
}
