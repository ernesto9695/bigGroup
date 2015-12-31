<?php 
 // function to debugge
    function debug($variable){

     	 echo '<pre>'.print_r($variable, true).'</pre>';
     }
     
     // Token generator 
    function str_random($length){
    	$alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    	return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
    
    // Test -Session status
    function logged_only(){
    	if(session_status() == PHP_SESSION_NONE){
            session_start();
    	}

        if(!isset($_SESSION['authentification'])){
	    	$_SESSION['flash']['danger']= "Sie haben keine Zugangsrecht auf diese Seite !"; 
	    	header('Location: index.php');
	    	exit();
       }
    }
     
    function send_mail($receiver_email, $receiver_name, $message=[]){
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Mailer = 'smtp';
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
                //$mail->Port = 465;
                //$mail->SMTPSecure = 'ssl';
                // or try these settings (worked on XAMPP and WAMP):
                 $mail->Port = 587;
                 $mail->SMTPSecure = 'tls';
                 
                 
                $mail->Username = "michelkamdem222@gmail.com";
                $mail->Password = "michel222";
                 
                $mail->IsHTML(true); // if you are going to send HTML formatted emails
                //$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
                 
                $mail->From = "michelkamdem@gmail.com";
                $mail->FromName = "Michel Kamdem";
                 
                $mail->addAddress($receiver_email, $receiver_name);
                //$mail->addAddress("user.2@gmail.com","User 2");
                 
                //$mail->addCC("user.3@ymail.com","User 3");
                //$mail->addBCC("user.4@in.com","User 4");
                 
                $mail->Subject = $message['subject'];
                $mail->Body = $message['body'];
            return $mail->Send();

        }
        
        function page_activation($statement, $index){
            if ($index == $statement) 
                 return "active";
            else
                return "";             
             
        }