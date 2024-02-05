<?php
include_once "sweph.php";

$sweph = new sweph();

$params = array(
	'altitude'=>0,
	'latitude'=>'28.6139',
	'longitude'=>'77.2090',	
	'year'=>2024,
	'month'=>01,
	'day'=>30,
	'hour'=>5.5
);
echo "<pre>".print_r($sweph->getLunarData($params['year'], $params['month'], $params['day'], $params['hour'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";
echo "<br><br>";
echo "New Data";
print_r(getLunarData);

//echo getLunarData(2024, $01, $29, $8)
?>
