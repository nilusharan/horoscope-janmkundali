<?php 
$libPath = '../sweph/ephe/';
putenv("PATH=$libPath");
date_default_timezone_set("Asia/Kolkata");
 ?>
<h2 style="color:green">Daily Panchang</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="datetime-local" style ="background-color: yellow; font-size: 18px;" value="<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['date1']);
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}	
else 
{
$birthDate = new DateTime();
$name= $birthDate->format('Y-m-d H:i');
echo $name;
}

?>" class="form-control" id="date1" name="date1">
<input type="submit">
</form>	
<?php
echo "this is from calender input as name: ";
echo $name;
echo "<br><br><br>";
$name=date("d  F  Y H:i:s", strtotime($name));
$birthDate = new DateTime($name);
$latitude = 28.6139;
$longitude = 77.2090;
$timezone = 5.50;
$offset = $timezone * (60 * 60);
$birthTimestamp = strtotime($birthDate->format('Y-m-d H:i:s'));
$utcTimestamp = $birthTimestamp - $offset;
$date = date('d.m.Y', $utcTimestamp);
$time = date('H:i:s', $utcTimestamp);

$h_sys = 'P';
//echo "<br>This date after formating: " . $name;
exec ("swetest -edir$libPath -b$date -ut$00:00 -p01 -sid5 -eswe -topo$longitude,$latitude,0 -n2 -fTPls -g, -head", $output);
//exec ("swetest -edir$libPath -b$date -ut$00:00 -p01 -sid5 -eswe -topo$longitude,$latitude,0 -n5 -fTPlsZGj -g -head", $output);
//exec ("swetest -p1 -d0 -b$date -ut00:00 -sid1 -eswe -topo$longitude,$latitude,0 -n31 -fTls -g, -head", $smdistance);
//exec ("swetest -edir$libPath -b$date -ut$time -p0123456789DAHFIGttt -sid1 -eswe -house$longitude,$latitude,$h_sys -fPlsgj -g", $output);
//exec ("swetest -edir$libPath -b$date -ut$time -p012 -eswe -g", $output);
//exec ("swetest -edir$libPath -b$name -p012 -g", $output1);
//exec ("swetest -edir$libPath -b$name -p01234567t -g", $output1);
//echo '<pre>',print_r($output,1),'</pre>';
//echo '<pre>',print_r($smdistance,1),'</pre>';
/*
foreach($smdistance as $key => $value)
{
  echo $key $value;
}
*/
//If you simply want to add commas between values, consider using implode
/*
$string = $smdistance[0];
$newStr = explode(",", $string);
$utc_Date = $newStr[0];
$m_n_distance = $newStr[1];
$m_n_relativeSpeed = $newStr[2];
echo "Date <b>Input</b> : " . $name . "<br>";
echo "Date <b>UTC</b> : " . $utc_Date . "<br>";
echo "Angular Disatance : " . $m_n_distance . "<br>";
echo "Relative Speed : " . $m_n_relativeSpeed;
echo "<br><br>";
print_r($newStr); 
echo "<br><br>";
//Calculation of tithi
if ($m_n_distance < 0) {
	$m_n_distance = $m_n_distance + 360;
}
$tithi1 = $m_n_distance/12;
echo "(1)Result after dividing distance by 12 : " . $tithi1;
$tithi2=floor($tithi1); //getting integer part
$tithi3=$tithi1 - $tithi2; //getting fractional part
echo "<br>(2) Integer part: " . $tithi2 . "<br>(3) And Fraction part = &nbsp;" . $tithi3;
$tithi4 = 1 - $tithi3; //Calculating part of the tithi left
echo "<br>(4) Part of the tithi left : " . $tithi4;
//Calculating time left from 5:30 am UTC 0hr
$tithi5 = ($tithi4 * 12 * 24) / $m_n_relativeSpeed;
echo  "<br>(5) Time left to ending of thithi from 5:30am : " . $tithi5;
$tithi6 = $tithi5 + 5.50;
echo  "<br>(6) Tithi will last upto : " . $tithi6; 
echo '<pre>',print_r($smdistance,1),'</pre>';
echo "<br><br><br>";
*/
echo '<pre>',print_r($output,1),'</pre>';

?>
