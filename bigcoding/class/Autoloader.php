<?php 
    namespace App;
    /**
    * Class Autoloader
    * @package App
    */
    class Autoloader {

         /**
         * Sauvegarde de L'Autoloader
         */
    	 
    	 static function register(){

               spl_autoload_register(array(__CLASS__, 'autoload'));

    	 }

         /**
         * Inclue le fichier correspondant a notre classe
         * @param $class string : nom de la class a charger
         */

    	 static function autoload($class){

            //Chargement dinamic du Namespace
            if(strpos($class, __NAMESPACE__.'\\') === 0){
            	
	    	 	$class = str_replace(__NAMESPACE__.'\\', '', $class);
	    	 	
	            $class = str_replace('\\', '/', $class);

                // chargement dinamic du dossier parent __DIR__
		    	require __DIR__.'/'.$class.'.php';
		   }
	    }
    }