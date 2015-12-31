<?php   
   namespace App;
   /**
   * load a database classe on $database and return it
   * unique Instans of Database
   */
   class App{

   	 const DB_NAME = 'bigcodingdatabase';
   	 const DB_HOST = 'localhost';
     const DB_USER = 'root';
     const DB_PASSWORD = 'ernestoroot';

   	 private static $database;


   	 public static function getDb(){

            if(self::$database === null){
            	    self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
            }

            return self::$database;
   	 }



   }