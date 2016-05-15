<?php



//SQUARE AND MULTIPLY ALGORITHM
function sqml($u,$m,$p){
	//Applying Euler's Formula
    if($m > $p){
        $phi_p = $p - 1;
        $m = $m%$phi_p;
    }
	//Initial round
	$b = bcpowmod($m,1,2);
	$u = bcpowmod($u,1,$p);
	$A = 1;
	if($b == 1){
		$A = bcpowmod(bcmul($A,$u),1,$p);
	}else if($b == 0){
		$A = 1;
	}
	$A_prev = 1;
	$i=0;
	while($i<100){
		if($m == 1){
			$m = ($m-$b)/2;
			$b = bcpowmod($m,1,2);
			return $A;
			$u = bcpowmod($u,2,$p);
			if($b == 1){
				$A = bcpowmod(bcmul($A,$u),1,$p);
			}

			break;
		}else{
			$m = ($m-$b)/2;
			$b = bcpowmod($m,1,2);
			$u = bcpowmod($u,2,$p);
			if($b == 1){
				$A = bcpowmod(bcmul($A,$u),1,$p);
			}
		}
		$i++;
	}
}

?>