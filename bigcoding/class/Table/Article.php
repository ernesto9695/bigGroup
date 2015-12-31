<?php 
    namespace App\Table;
    use App\App;
     /**
     *  classe to create a Article
     */
     class Article{

     	public static function getLast(){

     		//return App::getDb()->query('SELECT * FROM articles', __CLASS__);
     		return App::getDb()->query(
     			"SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
     			FROM articles
     			LEFT JOIN categories
     			     on category_id = categories.id
     			", __CLASS__);

     	}
     	
     	public function __get($key){

     		// ucfirst() take a first letter of the search-proprety
     		 $method = 'get'.ucfirst($key);
     		 $this->$key = $this->$method();
             return $this->$key; 
     	}


     	public function  getUrl(){
     	 	return 'services.php?p=article&id='.$this->id;
     	 }


     	public function getExtrait(){
            $html = '<p>'.substr($this->contenu, 0, 300) .'...</p>';
            $html .= '<p> <a href="'. $this->getURL().'" class="btn btn-primary">Voir la Suite&raquo;</a></p>';
     	 	return  $html;
     	 }
     }





