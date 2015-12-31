<?php
    require_once'inc/functions.php';
    session_start();

    if(!empty($_POST) AND !empty($_POST['username']) AND !empty($_POST['password'])){
 
      require_once'inc/db.php';

      
        // Ansuchen der gegebenen Benutzername im Datenbank 
        $req = $pdo ->prepare("SELECT * FROM users WHERE username = ? AND confirmed_at IS NOT NULL");
        $req ->execute([$_POST['username']]);
        $ident = $req ->rowCount(); 
        $user = $req ->fetch();
          
        if($ident==1 AND password_Verify($_POST['password'], $user ->password)){
           $_SESSION['authentification']=$user;
           $_SESSION['flash']['success']= "Sie sind jetzt angemeldet !";
           header('Location: ./account.php');
           exit();

        }else{
          $_SESSION['flash']['danger']= "Ungültiger Benutzername oder falsches Passwort !";
        }
     
 }

?>
<!DOCTYPE html>
<html>
     <head>
          <title> Registrieren </title>
          <meta charset = "utf-8/">
          <link rel = "stylesheet" href="css/style-inscription.css" type="text/css">
           
     </head>
     <body>    

         <div id="form-main">
            <div id="form-div">
               <h1><a href="index.php">BigCodingCenter</a></h1>

                <?php if(!empty($_SESSION['flash'])): ?>
                     
                        <?php foreach($_SESSION['flash'] as $type => $element): ?>
                          <div class ="alert alert-<?= $type ?>" >
                            <?= $element; ?>
                      
                          </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['flash']); ?>
               <?php endif;?>

               <form class="form" id="form1" method="POST" action="">
                
                  <label for="" class="name">
                    <input name="username" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" 
                     value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>" placeholder="Pseudo" id="name" />
                  </label>
                    
                  <label for="" class="passwd">
                    <input name="password" type="password" class="validate[required,custom[onlyLetter],length[0,20]] feedback-input" placeholder="Password" id="passwd" />
                  </label>
                               
                  <div class="submit">
                    <button type="submit" value="Login" id="button-blue">Login</button>
                  <div class="ease"></div>
                

               </form>
            </div>
          </div>
     </body>

</html>
