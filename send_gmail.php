<?php
//mailTemplet.php
if (isset($_POST["submit"])){
   if (isset($_FILES) && (bool) $_FILES){

		ini_set('max_execution_time', 300);

    //require "emailAddress.php";
	
        $uploadFile = basename($_FILES['attach']['name']);
        move_uploaded_file($_FILES['attach']['tmp_name'], $uploadFile);
        $fileName = $_FILES['attach']['name'];

        $to = $_POST['email'];
        $from = $_POST['fromEmail'];
        $subject = $_POST['subject'];
        $msgEn = $_POST['msgEn'];
        $msgAr = $_POST['msgAr'];

        //$arr = array_unique(returnArrayEmailAddress());

        $arr = array('abdu.hawi02@gmail.com');
        
        if (!empty($_POST["email"])){
        	$strWordCount = str_word_count($to, 1, '@.-_1234567890');
        	for ($i=0; $i < count($strWordCount) ; $i++) { 
        		array_push($arr, $strWordCount[$i]);
        	}
    	}
    	$arrayUnique = array_unique($arr);

    	/* use cntArr to save count of array for using after send email   */
        $cntArr = count($arrayUnique);
		

		for ($i=0; $i < count($arrayUnique); $i++) { 
			/* the email we will sent to it */
            $sendToEmail = $arr[$i];

		   /* ---------------                   ----------------- */ 
		   include_once("mailTemplet.php");
		   sendEmail($subject,$msgEn,$msgAr,$sendToEmail,$uploadFile,$fileName);

        }// end for loop
    } // end file not set
} // end button submit

?>

<html>
	<head><meta charset="UTF-8"></head>
	<body>
		<form method="post" action="" enctype="multipart/form-data" style="width:60%;text-align: center;margin-left:20%; margin-right:20%;">
            <input type="text" name="email" placeholder="email to:" style="width:50%;margin-left:25%; margin-right:25%;"/>
            <br>
            <input type="text" name="subject" placeholder="subject"style="width:50%;margin-left:25%; margin-right:25%;"/>
            <br>
			<textarea name="msgEn" placeholder="Content by Engilsh"  rows="4" cols="50"></textarea>
			
			<textarea name="msgAr" placeholder="المحتوى بالعربي"  rows="4" cols="50"></textarea>
			</br>
			attach file</br>
			<input type="file" name="attach"/> <br><br>
			<input type="submit" value="Send Email" name="submit" />
		</form>
	</body>

</html>
