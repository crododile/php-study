n! means n × (n − 1) × ... × 3 × 2 × 1

For example, 10! = 10 × 9 × ... × 3 × 2 × 1 = 3628800,
and the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.

Find the sum of the digits in the number 100!

<?php
function factorialDigitSum($n){
	$factorial = 1;
	for($x = $n; $x > 0; $x--){
		$factorial = $factorial * $x;
	}
	
	$digits = array();
	
	while($factorial > 0){
		array_push($digits, $factorial % 10);
		
		$factorial = floor($factorial/10);
	}
	$answer = 0;
	foreach ($digits as $n){
		$answer = $answer + $n;
	}
	echo $answer;
}

factorialDigitSum(100)
?>           
