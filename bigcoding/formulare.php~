<?php
    require_once'inc/functions.php';
    session_start();

    if(!empty($_POST)){

       $errors =array();
      require_once'inc/db.php';

      if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
         $errors['username']= "Ihre Benutzername ist nicht gültig (alphanumerische)!";
      }else{
        // Ansuchen der gegebenen Benutzername im Datenbank 
        $req = $pdo ->prepare("SELECT id FROM users WHERE username = ?");
        $req ->execute([$_POST['username']]);
        $user = $req ->fetch();
          if($user){
           $errors['username'] = " Diese Benutzername ist schon besetzt !";
          }
       }
     
      if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email']="Ungültige Email: bitte überprufen sie noch mal ihr Email !";
      }else{
         // Ansuchen das gegebene Email im Datenbank
         $req = $pdo ->prepare("SELECT id FROM users WHERE email = ?");
         $req ->execute([$_POST['email']]);
         $user = $req ->fetch();
         if($user){
          $errors['email'] = " Dieses Email ist schon für ein anderes Konto benutz  !";
         }
      }
      //  Passwort ueberpruefung 
      if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password']= " Sie müssen ein gültige Passwort eingeben !";
      }
    /* Hier wird gepruefung, ob das array-$errors leer ist, falls ja hat der 
        ist kein Fehler zu melden
     */
    if(empty($errors)){
 
       // Antrag zur Speicherung der Dateien im Datenbank
        $req =  $pdo ->prepare("INSERT INTO users SET username = ?, email = ?, password = ?, confirmation_token= ?");
        // password hashing
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // Token anlgen  mehr infomations ueber str_random() im functions.php
        $token = str_random(60);
        
        $req->execute([$_POST['username'],$_POST['email'], $password, $token]);
        $user_id = $pdo ->lastInsertId();
        $msg = array();
        $msg['body']="Um Ihr konto zu Bestätigen bitte ich sie den folgenden Link zu verfolgen.\n\n
        <a href=\"http://localhost/BigcodingCenter/confirm.php?id=$user_id&token=$token\" > Hier cliken </a>";  
        $msg['subject'] = " Konto Bestätigung ";
                
                // ----------------Mail-System-----------------
         require_once'../../PHPMailerAutoload.php';                 
         // send_mail-function to send a mail for confiramtion to your receiver
        if(send_mail($_POST['email'], $_POST['username'], $msg)){

          $_SESSION['flash']['success'] = "ein Mail zur Bestätigung ihr Konto wurde Ihnen geschicht !";
          // Weiterleitung zur Anmeldung
          header("Location: ./login.php");
            exit();
        }else{
                   $errors['flash']['danger']= "Mißerfolg während Senden des Mail zur Bestätigung !";
          // $errors['tokenToConfirmed'] = "http://localhost/webApp/confirm.php?id=$user_id&token=$token";
       }               
                 
    }

      //debug($errors);
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

    <?php if(!empty($errors)): ?>
           <div class ="alert alert-danger">
             <p>  Bitte füllen Sie das Formular richtig aus !</p>
              <ul>
              <?php foreach($errors as $error): ?>
                  <li><?= $error; ?></li>
              <?php endforeach;?>
             </ul>
           </div>
    <?php endif;?>

     <form class="form" id="form1" method="POST" action="">
      
        <label for="" class="name">
          <input name="username" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" 
           value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>" placeholder="Pseudo" id="name" />
        </label>
        
        <label for="" class="email">
          <input name="email" type="email" class="validate[required,custom[email]] feedback-input"
          value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" id="email" placeholder="Email" />
        </label>
        <label for="" class="passwd">
          <input name="password" type="password" class="validate[required,custom[onlyLetter],length[0,20]] feedback-input" placeholder="Password" id="passwd" />
        </label>
        <label for="" class="password_confirm">
          <input name="password_confirm" type="password" class="validate[required,custom[onlyLetter],length[0,20]] feedback-input" placeholder="Password Confirmation" id="passwdconfirm" />
        </label>
        
        
        
        
        <div class="submit">
          <button type="submit" value="SEND" id="button-blue">SEND</button>
        <div class="ease"></div>
      

     </form>
  </div>
     </body>

</html>
