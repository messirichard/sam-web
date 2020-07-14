<?
function GenerateSelectOptions($prefix, $sufix, $start, $limit) {
	$total = $start+$limit;
	$options = "";
	for ($i=$start;$i<$total;$i++) {
		$options .= '<option value="' . $i . '">' . $prefix . $i . $sufix . '</option>';
	}
	return $options;
}
function GenerateReviewStar($star,$total) {
	$review = "";
	for ($i=1;$i<$star;$i++) {
		$review .= '<i class="fa fa-star red"></i> ';		
	}
	for ($i=$star;$i<$total;$i++) {
		$review .= '<i class="fa fa-star grey"></i> ';
	}
	return $review;
}
function SendEmail($from_name,$from_email,$to_email,$subject,$body) {
	$headers= 'MIME-Version: 1.0' . "\r\n";
	$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers.= 'From: '.$from_name.'<'.$from_email.'> ' . "\r\n";
	$headers.= 'Reply-To: '.$from_email.' ' . "\r\n";
	$headers.= 'X-Mailer: PHP/' . phpversion();
	
	return @mail($to_email,$subject,$body,$headers);
}

function SendPHPMailer($smtp_server,$smtp_username,$smtp_password,$from_name,$to_email,$subject,$body) {
	$mail = new PHPMailer();

	$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->Host = $smtp_server;  // specify main and backup server
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = $smtp_username;  // SMTP username
	$mail->Password = $smtp_password; // SMTP password
	
	$mail->From = $smtp_username;
	$mail->FromName = $from_name;
	$mail->AddAddress($to_email);
	$mail->AddReplyTo($smtp_username);
	
/*	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
	$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name */
	$mail->IsHTML(true);                                  // set email format to HTML
	
	$mail->Subject = $subject;
	$mail->Body    = $body;
	//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	
	return $mail->Send();
}

function SubscribeEmail($email) {
	$strsql = "INSERT INTO subscribers_wls(email) VALUES('$email')";
	$sql = mysql_query($strsql);
}
?>