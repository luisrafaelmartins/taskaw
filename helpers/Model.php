<?php
//https://github.com/moltin/currency

namespace task\helpers;
abstract class Model{

    protected $data = [];
    public function __call($name, $arguments){
        if (count($arguments) == 2){

            list($class, $on) = [&$arguments[0], $arguments[1]];
            foreach ($this->data as &$modelData) {
                $modelData->$name = [];
                    
                $modelData->$name = array_values (array_filter($class->data,function($filter) use ($modelData,$on){
                    return $modelData->id == $filter->$on;
                }));
  
            }
           
        }
    } 

}