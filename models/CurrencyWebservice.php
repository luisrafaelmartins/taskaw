<?php
namespace task\models;
/**
 * Dummy web service returning random exchange rates
 *
 */
use CurrencyConverter\CurrencyConverter;
class CurrencyWebservice extends CurrencyConverter
{

	private $from = "GBP";
	private $availbleCurrencies = ["GBP", "USD", "EUR"];
    private $currencies = ["GBP" => 1, "USD" => 1.54, "EUR" => 1.35];
    private $currenciesCode = [163 => "GBP", 63 => "USD", 36 => "EUR"];
    /**
     *  On creation fetch currencies
     * @todo save the currencies on a DB to avoid many calls calls
     *
     */

    function __construct(){
        $this->syncCurrencies();
    }
    /**
     *  return currency symbol
     * @return currency symbol
     */
    public function getCurrencySymbol()
    {
        foreach ($this->currenciesCode as  $key => $code) {
            if ($code == $this->from){
                return chr($key);
            }
        }
    }
    /**
     *  return the value here for basic currencies like GBP USD EUR
     * @param code 
     * @return currency 
     */
    public function getExchangeRateBySymbol($code)
    {
        
        return $this->currencies[$this->currenciesCode[$code]];
    }
    /**
     *  return the value here for basic currencies like GBP USD EUR
     * @return currency 
     *
     */
    public function getExchangeRate()
    {
        
    	return $this->currencies[$this->currency];
    }

    /**
     *  set the basic currency
     * @param currency 
     * @param value to rate 
     */
    public function setExchangeRate($currency,$value)
    {
		$this->currencies[$currency] = $value;
    }

    /*
	*  refresh currenct currencies
    *  
    */
    public function syncCurrencies(){
    	foreach ($this->availbleCurrencies as $currency) {
    		if ($currency != $this->from){
                $this->currencies[$currency] = $this->convert($this->from, $currency);
            }
    	}
    }
}