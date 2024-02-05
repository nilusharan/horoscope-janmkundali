<?php
function dtimetotime($x,$y) {
  $m=$x + $y;//adding timezone time to given time
  $a=floor($m); //getting integer part of time in hour
  $b=$m - $a; //getting fractinal part of time from decimal hour
  $c=$b * 60; //converting fractional part of hour to minute
  $d=floor($c); //getting integer part of minute
  $e=$c - $d; //getting fractional part of minute
  $f=round($e*60);//getting second  
  $g= $a . ":" . $d .  ":" . $f .  " " . "hour";  
  return $g;
}
?>