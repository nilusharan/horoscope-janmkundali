<?php 
// path to swiss ephemeris library files
$libPath = '../sweph/ephe/';
putenv("PATH=$libPath");

//date_default_timezone_set("Asia/Kolkata");

/**
 * Assuming birth date to be 
 * 9th August 2017, 9:35 PM
 */
 ?>
<h2 style="color:green">Daily Panchang</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="date" style ="background-color: yellow; font-size: 18px;" value="<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['date1']);
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}	else 
{
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
$name=$today;
echo $name;	
}
?>" class="form-control" id="date1" name="date1">
<input type="submit">
</form>	
<?php


$latitude = 28.6139; // Latitude for San Francisco 
$longitude = 77.2090; // Longitude for San Francisco 
//$dateU = strtotime($name->format('Y-m-d H:i:s'));
$timezone = 5.50; 

/**
 * Converting birth date/time to UTC
 */
$offset = $timezone * (60 * 60);

$birthTimestamp = $name;
//->format('Y-m-d H:i:s');
$utcTimestamp = $birthTimestamp - $offset;

$date = date('d.m.Y', $utcTimestamp);
$time = date('H:i:s', $utcTimestamp);

$h_sys = 'P';


//$dateU = $name;
//$date = date('d.m.Y', $name);
//$time = date('H:i:s', $name);
echo "<br>This date after formating: " . $dateU;
//exec ("swetest -edir$libPath -b$dateU -ut$time -p0123456789DAHFIGttt -sid1 -eswe -house$longitude,$latitude,$h_sys -fPlsgj -g", $output);
exec ("swetest -edir$libPath -b$date -ut$time -p012 -sid1 -eswe -house$longitude,$latitude,$h_sys -fPlsgj -g", $output);
//exec ("swetest -edir$libPath -b$dateU -p0", $output);
echo '<pre>',print_r($output,1),'</pre>';
?>