The sum of the squares of the first ten natural numbers is,

12 + 22 + ... + 102 = 385
The square of the sum of the first ten natural numbers is,

(1 + 2 + ... + 10)2 = 552 = 3025
Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is 3025 − 385 = 2640.

Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.

<?php

$one_to_hundred = range(1, 100);
$sums_squared = 0;
$squares_summed = 0;

foreach($one_to_hundred as $n){
	$sums_squared += $n;
	$squares_summed += pow($n,2);
}

$sums_squared = pow($sums_squared, 2);
echo $sums_squared."<---sums squared\n".$squares_summed."<----squares summed\n";
echo $sums_squared - $squares_summed."<----difference\n";

?>