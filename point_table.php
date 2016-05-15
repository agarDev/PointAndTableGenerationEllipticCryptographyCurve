<?php 
/*
	* @Author Mayur Agarkar
	* @Author Suchanda Mukherjee
	* This utility generates the point in tabular format for Elliptic Curve Cryptography
*/


if($_POST['submit']){
	$p = filter_var($_POST['p'], FILTER_SANITIZE_NUMBER_INT);
	$a = filter_var($_POST['a'], FILTER_SANITIZE_NUMBER_INT);
	$b = filter_var($_POST['b'], FILTER_SANITIZE_NUMBER_INT);
	$answers = array();
	$col1 = array();
	echo '<table border="1" cellpadding="5">';
	for($i = 0; $i < ($p); $i++){
		$x_cube = bcpow($i,3);
		$ax = bcmul($a,$i);
		$y_square = sqml(($x_cube+$ax+$b),1,$p);
		$verification = sqrt_algo($y_square,$p);
		if(count($verification) > 0){
			
			foreach($verification as $v){
				echo '<tr>';
				//Finding P
				$temp = '<td><center>('.$i.','.$v.')</center></td>'; // P 
				$xp = $i; // X of P = i
				$yp = $v; // Y of P = v
				
				//Finding 2P
				$slope = slope($xp,$yp,$a,$p);
				$_2P = findmulp($slope,$xp,$yp,$p);
				$x2p = $_2P[0]; // X of 2p
				$y2p = $_2P[1]; // Y of 2P
				$temp = $temp.'<td><center>('.$x2p.','.$y2p.')</center></td>';
				
				//Findin 3P
				for($l=0;$l<($p-3);$l++){
					if(($x2p-$xp) != 0){
						if(($x2p-$xp) < 0){
							$neum = -1*($y2p-$yp);
							$denom = -1*($x2p-$xp);
						}else{
							$neum =($y2p-$yp);
							$denom = ($x2p-$xp);
						}
						$slope = sqml(($neum*fish($denom,$p)),1,$p);
						$_3p = _3p($slope,$xp,$yp,$x2p,$y2p,$p);
						$temp = $temp.'<td><center>('.$_3p[0].','.$_3p[1].')</center></td>';
						$x2p = $_3p[0];
						$y2p = $_3p[1];
					}else{
						$temp = $temp.'<td><center>-</center></td>';
					}
				}
				
				echo $temp;
				echo '</tr>';
			}
			
			
		}
		
	}
	echo '</table>';
}


//Dependencies Inclusion
include_once '2P.php';
include_once '3P.php';
include_once 'slope.php';
include_once 'fish_algo.php';
include_once 'square_multiply.php';
include_once 'square_root.php';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Point and table Generation</title>
</head>

<body>
	<h3>Format of equation => y^2 = x^3 +- ax +- b mod p</h3>
    <form action="pont_table.php" method="POST">
    value of a => <input type="text" name="a" id="a" value="" /><br />
    value of b => <input type="text" name="b" id="b"  value="" /><br />
	value of p => <input type="text" name="p" id="p"  value="" /><br />
    <input type="submit" name="submit" id="submit" value="Submit" />
    </form><br />
    <div id="Table"></div>
</body>
</html>