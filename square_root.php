<?php



//SQUARE ROOT ALGORITHM
function sqrt_algo($a,$p){
	$test = 0;
	$test = bcpowmod($p,1,4);
	if($test == 3){ // is p = 3 (mod 4)
		$r = 0;
		$pow = bcdiv(($p+1),4);
		$answer = sqml($a,$pow,$p);
		$answer_2 = $p - $answer;
		//Verification Process
		//put 1st root in place of X 
		$veri_1 = sqml($answer,2,$p);
		$veri_2 = sqml($answer_2,2,$p);
		$verification = array();
		if($veri_1 == bcpowmod($a,1,$p)){ $verification[] = $answer;}
		if($veri_2 == bcpowmod($a,1,$p)){ $verification[] = $answer_2;}
		return $verification;
	}
}


?>