<?php
include 'Mail.php';

function Send_Mail($to,$subject,$body)
{	
	$from ="starcontest";
	
	$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject
	);
	
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'starcontests8@gmail.com',
			'password' => 'senteam8'
	));
	
	$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
		return 0;
	} else {
		//echo('<p>Message successfully sent!</p>');
		return 1;
	}		
}


?>
