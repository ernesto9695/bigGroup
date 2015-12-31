<?php 
  session_start();
  unset($_SESSION['authentification']);
  $_SESSION['flash']['success']="Sie wurden erfolgreich abgemeldet !";
  header('Location: ./index.php');
