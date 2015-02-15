<?php 
namespace task\scripts;
// print formatted report

class report{
	public static function print_formated($merchantInfo, $symbol, $currency){
		echo "Merchant id: {$merchantInfo->id}, name: {$merchantInfo->name}". PHP_EOL. PHP_EOL;
		if (count($merchantInfo->transactions) > 0){
			echo "date		|	Price". PHP_EOL;
			foreach ($merchantInfo->transactions as $transaction) {
				$value = utf8_decode($transaction->value);
				$price = $currency->getExchangeRateBySymbol(ord(substr($value, 0, 1)) ) * (float) substr($value, 1);
				echo "{$transaction->date}	|	{$symbol} {$price}". PHP_EOL;
				
			}
		}else{
			echo "Merchant {$merchantInfo->name} doesn't have transactions";
		}
		
	}

}
