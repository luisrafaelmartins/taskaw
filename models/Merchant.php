<?php

namespace task\models;
use task\helpers\Model;
class Merchant extends Model
{
	/**
	 * @todo creates some fake merchants, if it was connected to a database this would't be required 
	 *
	 */

	public function __construct(){
		for ($i=1; $i < 10 ; $i++) { 
			$stdObj = new \StdClass();
			$stdObj->id = $i;
			$stdObj->name = "Merchant".$i;
			$this->data[] = $stdObj;
		}
		
	}
	/**
	 * get transations of the user 
	 *
	 */
    public function getTransactions($id)
    {
        return $this->data[$id]->transactions;
    }
	/**
	 * get merchant info 
	 * @return array
	 *
	 */
    public function getMerchant($id){

    	foreach ($this->data as $key => $merchant) {
    		if ($merchant->id == $id){
				return $merchant;
    		}
    	}

    	throw new \Exception("Merchant doesn't exists");

    }
    /**
	 * makes a relationship between merchant and transitions
	 * @param transition object
	 * @todo as its is not connected to a database I have to pass file, otherwise it would just get the information on a __constructor
	 *
	 */
    public function hasTransactions($relation){
    	$this->transactions($relation,"merchant");
    }
}