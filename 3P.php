<?php

//Find 3Ps
function _3p($slope,$x,$y,$x2p,$y2p,$p){
	$slope_sq = bcpow($slope,2);
	$tmp = $slope_sq-$x2p-$x;
	$x3p = sqml($tmp,1,$p);
	if($x3p < 0){
		$x3p = $p + $x3p;
	}
	$tp = $x-$x3p;
	$tp = bcmul($slope,$tp);
	$tp = $tp - $y;
	$y3p = bcpowmod($tp,1,$p);
	if($y3p < 0){
		$y3p = $p + $y3p;
	}
	$ret_ans = array();
	$ret_ans[] = $x3p;
	$ret_ans[] = $y3p;
	return $ret_ans;
}


?>