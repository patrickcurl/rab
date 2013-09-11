<?php
function floorToFraction($number, $denominator = 1)
{
    $x = $number * $denominator;
    $x = floor($x);
    $x = $x / $denominator;
    return $x;
}

echo floorToFraction(50.51, 2) . "-- 50.51 <br />";
echo floorToFraction(50.59, 2) . "-- 50.59 <br />";
echo floorToFraction(50.99, 2) . "-- 50.99 <br />";
echo floorToFraction(50.49, 2) . "-- 50.51 <br />";

$num = 50.00;
for($i=0;$i<100;$i++){
	echo floorToFraction($num, 2) . "-- {$num} <br />";
	$num = $num + .01;
}
?>