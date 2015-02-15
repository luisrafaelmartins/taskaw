<?php
namespace task\models;
use task\helpers\Model;
use task\helpers\CSVReader;
/**
 * Source of transactions, can read data.csv directly for simplicty sake, 
 * should behave like a database (read only)
 *
 */
class TransactionTable extends Model
{
	
    public function __construct($file){

    	$file = new CSVReader($file);
    	$file->readFile();
    	$content = $file->getContent();
    	$header = $file->getHeaders();
        if (in_array("value", $header) && in_array("merchant", $header) && in_array("date", $header)){
            foreach ($content as $fkey => $field) {
                $this->data[$fkey] = new \stdClass();
                foreach ($field as $vkey => $value) {
                    
                    $this->data[$fkey]->{$header[$vkey]} = $value;
                    
                }
            }
        }else{
            throw new \Exception("Wrong file formatation");
            
        }
    	

    }
 	/**
     * 
     * @return transation of the merchant
     */
    public function getTransationByMerchantId($id){
    	return $this->data[$id];
    }
 	/**
     * 
     * @return all transations
     */
    public function getTransation(){
    	return $this->data;
    }
    
}