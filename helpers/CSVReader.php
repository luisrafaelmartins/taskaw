<?php
namespace task\helpers;
class CSVReader{

    private $handle;
    private $headers = [];
    private $content = [];
    function __construct($file){
        if (file_exists($file)){
            $this->handle = fopen ($file,"r");
        }else{
            die("The file {$file} dosn't exists");
        }
        
    }
    /**
    *
    * @return content 
    *
    */
    function getContent(){
        return $this->content;
    }
    /**
    *
    * @return headers 
    *
    */
    function getHeaders(){
        return $this->headers;
    }
    /**
    *
    * get the 1st line of the file for the headers
    *
    */
   
    function setHeaders(){
        $position = ftell($this->handle);
        rewind($this->handle);
        $read =  $this->readLine();
        if( $read === FALSE){
            die("File is empty");
            
        }else{
            $this->headers = $read;
        }

        fseek ($this->handle, $position );
    }
    /**
    *
    * read a single line
    *
    */
    function readLine(){
        $data = fgetcsv($this->handle,0,";");
        return $data; 
        
    }
    /**
    *
    * read all the file
    *
    */
    
    function readFile(){
        $this->setHeaders();
        $this->readContent();

    }
    /**
    *
    * read just the content
    *
    */
    function readContent(){

        if (ftell($this->handle) == 0){
            $this->readLine();
        }
        $this->content = [];
        
        while ( ($read =  $this->readLine()) !== FALSE){
            $this->content[] = $read;
        }
    }
    /**
    *
    * close file
    *
    */
    
    function close(){
        fclose($this->handle);
    }


}
