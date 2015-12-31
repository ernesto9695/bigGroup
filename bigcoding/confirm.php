<?php

    $user_id = $_GET['id'];
    $token = $_GET['token'];

    require 'inC/db.php';

    $req = $pdo ->prepare('SELECT * FROM users WHERE id = ?');
    $req ->execute([$user_id]);
    $user = $req ->fetch();
    session_start();

    if($user && $user->confirmation_token == $token){
         $req = $pdo ->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id= ?');
         $_SESSION['flash']['success'] ="Ihr konto wurde erfolgreich bestätig !";
         $req ->execute([$user_id]);
         $_SESSION['authtification'] = $user;
         header('Location: account.php');
    }else{
    	 $_SESSION['flash']['danger'] = "dieses Token ist nicht mehr gültig !";
         header('Location: login.php');
    }