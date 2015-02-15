<?php
namespace task\models;
use task\models\CurrencyWebservice;
/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter extends CurrencyWebservice
{
    protected $currency = "GBP";

    function __construct(){
        parent::__construct();
    }


    /**
     * get assigned currency
     * @return currency
     */
    public function getPriceCurrency()
    {
        return $this->currency;
    }

    /**
     * set currency
     * @param $currency
     */
    public function setPriceCurrency($currency)
    {
        $this->currency = $currency;
    }
}