<?php require'functions.php';
    if(session_status() == PHP_SESSION_NONE){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/buttonStyle.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/addstyle.css" type="text/css" media="screen">
		<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/cufon-replace.js" type="text/javascript"></script>
		<script src="js/Mate_400.font.js" type="text/javascript"></script>
		<script src="js/FF-cash.js" type="text/javascript"></script>
		<script src="js/tms-0.3.js" type="text/javascript"></script>
		<script src="js/tms_presets.js" type="text/javascript"></script>
		<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
		 
	</head>
	<body id="page1">
		<div class="extra">
			<div class="main">
<!--==============================header=================================-->
				<header>
                                       
                                                                         
				       <div class="wrapper p4">
						<h1><a href="index.php">Bigcodingcenter</a></h1>
                                                <form class="form-wrapper">							 
								 <input type="text" id="search" placeholder="Search ..." required> 
								 <input type="submit" value="go" id="submit-search"> 	                                                	                                         
                                                </form>
					</div>
                    <div  class="wrapper p4" >         
                            <ul class="list-services">
                                    <?php if(isset($_SESSION['authentification'])): ?>
                                       <li><a href="./logout.php" class="form-log"><input id="connect-user" type="submit" value="Logout"></a></li> 
                                    <?php else:?>
									<li><a href="./login.php" class="form-log"><input id="connect-user" type="submit" value="Login"></a></li>
									<li><a href="./register.php" class="form-log"><input id="connect-user" type="submit" value="Register"></a></li>
									<?php endif; ?>                                           
									                    									                                           
                            </ul>
                    </div> 
					<nav>
						<ul class="menu">
							<li class="<?= page_activation(1, $current); ?>"><a href="index.php">Home</a></li>
							<li class="<?= page_activation(2, $current); ?>"><a href="features.php">Features</a></li>
                            <li class="<?= page_activation(3, $current); ?>"><a href="services.php">Services</a></li>							 
							<li class="<?= page_activation(4, $current); ?>"><a href="downloads.php">Downloads</a></li>
                            <li class="<?= page_activation(5, $current); ?>"><a href="chats.php">Chat</a></li>
                    		<li class="<?= page_activation(6, $current); ?>"class=""><a href="forum.php">Forum</a></li>
							<li class="last"><a href="contacts.php">Contacts</a></li>
						</ul>
					</nav>
