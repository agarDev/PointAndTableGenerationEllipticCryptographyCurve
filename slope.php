<?php

//find slope
function slope($xa,$ya,$a,$p){
	$p1 = bcadd($a,bcmul(3,bcpow($xa,2)));
	$inverse = fish(bcmul(2,$ya),$p);	
	$leftpart = bcmul($p1,$inverse);
	$slope = sqml($leftpart,1,$p);
	return $slope;
}

?>