<?php

/*
autoload Class
*/

class Autoload{

	static private $classes = [];
	/**
    *
    * set and get classes configuration
    *
    */
	
	public function getClasses(){
		return self::$classes;
	}
	public function setClasses($classes){
		self::$classes = $classes;	
	}
	/**
    *
    * iterate directories 
    *
    */

	public static function iterateDirectory($path){

		if (!empty($path)){
			$directoryIterator = new DirectoryIterator($path);//creates a directoryIterator to itereate on the directorires
			foreach ($directoryIterator as $file) {
				if(!$file->isDot() && $file->isDir()) { //Only uses directories and skips the "."
	                //recursive call to the sub directory
					self::iterateDirectory($file->getPathname());
	            }elseif ($file->isFile() && $file->getExtension() === "php") { //is a php file
	            	
	            	self::registerClass($file->getBasename(".php"),$path.$file->getBasename()); // Register class
	            }
			}
		}
	}
	/**
    *
    * register class
    *
    */
	public static function registerClass($class, $file)
    {
        self::$classes[$class] = $file;
    }
    /**
    *
    * class inclusion
    *
    */ 
    public static function loadClass($class)
    {
        $explodedName = explode('\\', $class);
    	$className = end($explodedName);
        if (isset(self::$classes[$className])) {
            require_once(self::$classes[$className]);
        }
        else {
            throw new \Exception("The class {$class} doesn't exist");
        }
    }
}

spl_autoload_register(array('Autoload', 'loadClass'));