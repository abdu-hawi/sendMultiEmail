<?php

// write all email by space between one and other like inside str varibal
$str = " 
a@ae.a a@aw.a a@qa.a az@a.a as@a.a ag@a.a ah@a.a aj@a.a ak@a.a al@a.a ap@a.a ao@a.a ai@a.a au@a.a ay@a.a at@a.a ar@a.a ae@a.a aw@a.a aq@a.a af@a.a ad@a.a ac@a.a ab@a.a aa@ac.a a1@a.a a@a1.a
	";

	$arrayEmailAddress = array();

	function returnArrayEmailAddress(){
		global $arrayEmailAddress;
		global $str;
		$s = str_word_count($str, 1, 'àáãç3@.-_4500179268');
		for ($i = 0; $i <  count($s); $i++) {
			$val=$s[key($s)];
			if ($val<> ' ') {
			   array_push($arrayEmailAddress, $val);
			}
			next($s);
		}
		// for ($i=0; $i < count($arrayEmailAddress) ; $i++) { 
		// 	echo "<br> $i: ".$arrayEmailAddress[$i];
		// }
		return $arrayEmailAddress;
	}


?>