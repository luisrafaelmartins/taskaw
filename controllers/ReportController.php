<?php

namespace task\controllers;
/**
*
* Report controller
*
*/

use \task\models\TransactionTable;
use \task\models\Merchant;
use \task\models\CurrencyConverter;
use \task\scripts\report;

class ReportController{

	public function getReport($file,$merchantId){
		$transitions = new TransactionTable($file);
		$merchant = new Merchant;
		$currency = new CurrencyConverter;
		$merchant->hasTransactions($transitions);
		$merchant->getTransactions($merchantId);
		$merchantInfo = $merchant->getMerchant($merchantId);
		$headers = $transitions->getHeaders();

		$symbol = $currency->getCurrencySymbol();

		report::print_formated($merchantInfo, $symbol, $currency);
		
	}

}