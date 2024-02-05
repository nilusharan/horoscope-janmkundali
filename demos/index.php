<?php
include_once "sweph.php";

$sweph = new sweph();

$params = array(
	'altitude'=>0,
	'latitude'=>'28.6139',
	'longitude'=>'77.2090',
	//'latitude'=>'40.649645',
	//'longitude'=>'-76.93392',
	'year'=>2024,
	'month'=>01,
	'day'=>28
);

echo "<pre>".print_r($sweph->getSunrise($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";
echo "<br><br><b>Sun Longitude";

echo "<pre>".print_r($sweph->getSunLongitude($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";
echo "<br><br><b>Moon Longitude";
echo "<pre>".print_r($sweph->getMoonLongitude($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";

echo "<br><br><b>Difference between Sun and Moon Longitude";
echo "<pre>".print_r($sweph->getDiff($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";

//calculation of difference between sun and moon longitude
//$sun_long=($sweph->getSunLongitude($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true);
//$moon_long=($sweph->getMoonLongitude($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true);

//$diff = $moon_long - $sun_long;
//		if($diff < 0)
//			$diff = $diff + 360;
//		return $diff;
//	}
//echo "<br><br>Difference between Moon and sun longitude:" $diff;
echo "<br>This is get House Pos<br>";
echo "<pre>".print_r($sweph->getHousePos($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";

echo "<br>This is get Lunar Data<br>";
echo "<pre>".print_r($sweph->getLunarData($params['year'], $params['month'], $params['day'], $params['longitude'], $params['latitude'], $params['altitude']),true)."</pre>";
echo "<br><br>";
echo "New Data";
print_r(getLunarData);
?>
