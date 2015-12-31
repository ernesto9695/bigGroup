<?php 
  require'class/Autoloader.php';
  use  \App\Autoloader;
   Autoloader::register();
 
   if(isset($_GET['p'])){

   	     $p = $_GET['p'];
   }else{
   	 $p = 'home';
   }

   // Objects Initialisation
  
    //$db = new App\Database('blog');

   ob_start();
   if($p === 'home'){
   	   require 'services/home.php';

   }elseif ($p === 'article') {
   	   require 'services/single.php';
   }

   $content = ob_get_clean();
   require'services/templates/default.php';