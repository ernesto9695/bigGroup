<?php 
    namespace App\Table;
    use App\App;
     /**
     *  classe to create a Article
     */
     class Categorie{
      
      private static $table = 'categories';

      public function all(){

          return App::getDb()->query(
     			"SELECT *
     			FROM ".self::$table."
     	 
     			", __CLASS__);

      }


     }