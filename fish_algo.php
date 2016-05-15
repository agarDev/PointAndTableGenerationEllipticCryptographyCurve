<?php

//Fish Algorithm
function fish($a,$p){
	$row_1 = array();
	$row_2 = array();
	$row_1[0] = $p;
	$row_1[1] = $a;
	if($row_1[1] != 0){
		$row_2[] = intval(bcdiv($row_1[0],$row_1[1]));
	}else{
		$row_2[] = 0;
	}
	while(bcpowmod($row_1[(count($row_1)-2)],1,$row_1[(count($row_1)-1)]) >= 1){
		$row_1[] = bcpowmod($row_1[(count($row_1)-2)],1,$row_1[(count($row_1)-1)]);
		$row_2[] = intval(bcdiv($row_1[(count($row_1)-2)],$row_1[(count($row_1)-1)]));
	}
	$tmp = 1;
	$tmp_prev = 0;
	$t = 1;
	unset($row_2[(count($row_2)-1)]);
	for($i = (count($row_2)-1);$i>=0;$i--){
		$tmp = $row_2[$i];
		$prev_tmp = $t;
		$t = ($tmp * $t) + $tmp_prev;
		$tmp_prev = $prev_tmp;
	}
	$index = (count($row_1)-1);
	if(($index%2) == 0){
		$final = $row_1[0] - $t ;
	}else if(($index%2) == 1){
		$final = $t;
	}
	return $final;
}


?>