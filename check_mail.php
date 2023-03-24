<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
 //phpinfo();
$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: TutorChamps Student Support <info@tutorchamps.com>' . "\r\n";
		$mailContent = '<!DOCTYPE html>
							<html>
							<head>
								<meta charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1">
								<title></title>
							</head>
							<body>Test</body>
							</html>';
					
		$status = mail('mychoice@yopmail.com','TEST',$mailContent,$headers);

 if($status)
   { 
    echo '<p>Your mail has been sent!</p>';
    } else { 
     echo '<p>Something went wrong, Please try again!</p>'; 
  }
?>