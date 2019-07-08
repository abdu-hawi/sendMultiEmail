<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$cnt = 0;
$cntArr = 0;
$cntSent = 0;
$cntNotSent = 0;
$sendToEmailArray = array(); // this use to collection email not sent to it


function sendEmail($subject,$msgEn,$msgAr,$sendToEmail,$uploadFile,$fileName){

	require_once './PHPMailer/src/Exception.php';
    require_once './PHPMailer/src/PHPMailer.php';
    require_once './PHPMailer/src/SMTP.php';
	
	global $cnt;
	global $cntArr;
	global $cntSent;
	global $cntNotSent;
	global $sendToEmailArray;
	
	$subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";


    /* Instantiation and passing `true` enables exceptions */
    $mail = new PHPMailer(true);
    
	/* Use SMTP. */
    $mail->isSMTP();
    /* Set authentication. */
    $mail->SMTPAuth = true;
    /*secure transfer enabled REQUIRED for Gmail*/
    $mail->SMTPSecure = 'tls';
    /* Google (Gmail) SMTP server. */
    $mail->Host = 'smtp.gmail.com';
    /* SMTP port. */
    $mail->Port = 587;
    /* Username (email address). */
    $mail->IsHTML(true);
    $mail->Username = 'myEmail@gmail.com';
    /* Google account password. */
    $mail->Password = '*******';

    $mail->setFrom('myEmail@gmail.com', 'Abdu');
    $mail->Subject = $subject;
	
	if (empty($msgAr)){
		$mail->Body = '<table> 
		  <tr>
			<td style="width:50%;text-align: left;">'.$msgEn.'</td>
		  </tr>
		</table>';
	} elseif (empty($msgEn)){
		$mail->Body = '<table> 
		  <tr>
			<td style="width:50%;text-align: right;">'.$msgAr.'</td>
		  </tr>
		</table>';
	}else{
		$mail->Body = '<table style="width:80%; background-color:LightGray;margin-left:10%; margin-right:10%;"> 
		  <tr>
			<td style="width:50%;text-align: left;">'.$msgEn.'</td>
			<td style="width:50%;text-align: right;">'.$msgAr.'</td>
		  </tr>
		</table>';
	}
	
    
	
    $mail->addAddress($sendToEmail);
    $mail->addAttachment($uploadFile, $fileName);

    /* Finally send the mail. */
    if($mail->Send()) {
    	$cnt++;
    	$cntSent++;
    	if ($cntArr == $cnt){
    		die( "Message has been sent to ".$cntSent. " , and not sent to ".$cntNotSent);
    	}
     }else{
     	$cnt++;
     	$cntNotSent++;
     	if ($cntArr == $cnt){
    		die( "Message has been sent to ".$cntSent. " , and not sent to ".$cntNotSent);
    	}
     }
}

?>