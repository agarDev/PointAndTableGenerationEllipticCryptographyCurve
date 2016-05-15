<?php
//Finding 2P
function findmulp($slope,$xp,$yp,$p){
	$answer = array();
	//Finding X2P
	$slope_square = bcpow($slope,2);
	$left = bcsub($slope_square,bcmul(2,$xp));
	if(sqml($left,1,$p) < 0){
		$answer[] = $p + sqml($left,1,$p);
	}else{
		$answer[] = sqml($left,1,$p);
	}
	
	//Finding Y2P
	$l1 = bcmul($slope,bcsub($xp,$answer[0]));
	$l2 = bcsub($l1,$yp);
	if(sqml($l2,1,$p) < 0){
		$answer[] = $p + sqml($l2,1,$p);
	}else{
		$answer[] = sqml($l2,1,$p);
	}
	return $answer;
}
?>