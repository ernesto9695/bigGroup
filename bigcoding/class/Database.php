<?php 
   namespace App;
   use \PDO;
   /**
   *   Classe for Connect to Database
   */
   class Database
   {    private $db_name;
   	    private $db_host;
   	    private $db_user;
   	    private $db_password;
   	    private $pdo;
   	
	   	function __construct($db_name, $db_host = 'localhost', $db_user = 'root', $db_password = ''){

	   		 $this->db_name = $db_name;
	   		 $this->db_host = $db_host;
	   		 $this->db_user = $db_user;
	   		 $this->db_password = $db_password;	   		 
	   	}

	   	private function getPDO(){

            if($this->pdo === null){
			   		$pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_password);
		            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		            $this->pdo = $pdo;
		    }
           
            return $this->pdo;
	   	}

	   	public function query($statement, $classe_name){
	   		$result = $this->getPDO()->query($statement);
            $datas = $result->fetchAll(PDO::FETCH_CLASS, $classe_name);
            return $datas;
	   	}

	   	public function prepare($statement, $attributes, $classe_name, $one = false){
	   		$req = $this->getPDO()->prepare($statement);
	   		$req ->execute($attributes);
	   		$req ->setFetchMode(PDO::FETCH_CLASS, $classe_name);

	   		if($one){
                
               	  $datas = $req->fetch();

	   		}else{

	   			  $datas = $req->fetchAll();
	   		}
	   		return $datas;
	   	}

   }
