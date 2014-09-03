// primefactorize each factor of 20!, reduce to set, multiply the set together
counting from 1 - 20, put factors ofeach number into associative array.


<?php
$factors = array();
$one_twenty = range(1, 20);

foreach ($one_twenty as $n) {
	echo $n."\n";
	foreach($factors as $f){
		if($n%$f == 0){
			echo "\n".$f." divides ".$n;
			$n = $n/$f;
			echo "\nn is now ".$n."\n";
		}
	}
	array_push($factors, $n);
}
$answer = 1;
foreach ($factors as $n){
	$answer = $answer * $n;
}

echo $answer;
?>           
