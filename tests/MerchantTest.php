<?php

/**
 * Tests merchant and his transactions
 */
use \task\models\TransactionTable;
use \task\models\Merchant;
use \task\models\CurrencyConverter;
use \task\scripts\report;

class MerchantTest extends \PHPUnit_Framework_TestCase
{

	/**
    *
    * Tests for the correct functioning of the merchant
     */
    public function testReportContent()
    {
        $merchant = new Merchant;
        $merchantInfo = $merchant->getMerchant(1);

		$merchantTest = new \stdClass();
		$merchantTest->id = 1;
		$merchantTest->name = "Merchant1";
		
        $this->assertEquals($merchantInfo, $merchantTest);
    }

    /**
    *	
    * Tests for the correct functioning of the merchant transactions
    * @depends testReportContent
     */
    public function testTransactions()
    {

		$transitions = new TransactionTable("data.csv");
        $merchant = new Merchant;
		$merchant->hasTransactions($transitions);
		$merchantInfo = $merchant->getMerchant(1);

		$merchantTest = new \stdClass();
		$merchantTest->id = 1;
		$merchantTest->name = "Merchant1";
		$merchantTest->transactions = [];

		$merchantTest->transactions[0] = new \stdClass();
		$merchantTest->transactions[1] = new \stdClass();
		$merchantTest->transactions[2] = new \stdClass();
		$merchantTest->transactions[3] = new \stdClass();

		$merchantTest->transactions[0]->merchant = 1;
		$merchantTest->transactions[1]->merchant = 1;
		$merchantTest->transactions[2]->merchant = 1;
		$merchantTest->transactions[3]->merchant = 1;

		$merchantTest->transactions[0]->date = "01/05/2010";
		$merchantTest->transactions[1]->date = "02/05/2010";
		$merchantTest->transactions[2]->date = "02/05/2010";
		$merchantTest->transactions[3]->date = "03/05/2010";

		$merchantTest->transactions[0]->value = "£50.00";
		$merchantTest->transactions[1]->value = "£11.04";
		$merchantTest->transactions[2]->value = "€1.00";
		$merchantTest->transactions[3]->value = "$23.05";
		
        $this->assertEquals($merchantInfo, $merchantTest);
    }

    
}
