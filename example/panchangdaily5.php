<?php 
$libPath = '../sweph/ephe/';
putenv("PATH=$libPath");
include 'impFiles/dateCalFun.php'; //decimal date to time file
include 'impFiles/karan_calculation.php'; //karan Calculation
include 'impFiles/sunRiseSetCal.php'; //karan Calculation
$timezone = 5.50;
//date_default_timezone_set("Asia/Kolkata");
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
echo $name . "<br>";
$name1 = strtotime("+1 day", strtotime($name));
echo "this is name1 after adding one day: ";
$name1=date("d  F  Y H:i:s", $name1);
echo $name1 . "<br>";
echo "<br><br><br>";
$name=date("d  F  Y H:i:s", strtotime($name));
$birthDate = new DateTime($name);
$latitude = 28.6139;
$longitude = 77.2090;

$offset = $timezone * (60 * 60);
$birthTimestamp = strtotime($birthDate->format('Y-m-d 5:30:00'));
$utcTimestamp = $birthTimestamp - $offset;
$date = date('d.m.Y', $utcTimestamp);
$time = date('00:00', $utcTimestamp);

$h_sys = 'P';
//echo "<br>This date after formating: " . $name;


exec ("swetest -edir$libPath -eswe -b$date -ut00:00 -rise -p0 -topo$longitude,$latitude,0 -n2 -hindu -g, -head", $sr);
exec ("swetest -edir$libPath -eswe -b$date -ut00:00 -rise -p1 -topo$longitude,$latitude,0 -n2 -hindu -g, -head", $mr);
//Calculation of SunRise and Sun Set
$sunRise = $sr[1];
$newSR = explode(",",$sunRise);
$newSunRise = $newSR[2];
$newSunSet = $newSR[5];
echo "Sun-Rise : <b>" . " " . decimalHours($newSunRise,$timezone) . "</b><br>";
echo "Sun-Set : <b>" . " " . decimalHours($newSunSet,$timezone) . "</b><br>";
echo '<pre>',print_r($newSR,1),'</pre>';
//swetest to calculation position of sun and moon
exec ("swetest -edir$libPath -b$date -ut$time -p01 -sid1 -eswe -n2 -fTPls -g, -head", $output);

//Sun statistics Angle
$sunString = $output[0];
$newSunStr = explode(",", $sunString);
$utcDateSun = $newSunStr[0];
$sunName = $newSunStr[1];
$sunAngle = $newSunStr[2];
$sunSpeed = $newSunStr[3];
echo "<b>Sun's Data : </b>";
echo "<span style='color:red'>Date Input =</span> " . $name . "<br>";
echo "<span style='color:red'>Date UTC Date Sun =</span> " . $utcDateSun . "<br>";
echo "<span style='color:red'>Planet Name =</span> " . $sunName . "<br>";
echo "<span style='color:red'>Sun Angle =</span> " . $sunAngle . "<br>";
echo "<span style='color:red'>Sun Speed =</span> " . $sunSpeed . "<br>";
//Moon statistics
$moonString = $output[1];
$newMoonStr = explode(",", $moonString);
$utcDateMoon = $newMoonStr[0];
$moonName = $newMoonStr[1];
$moonAngle = $newMoonStr[2];
$moonAngle1= $newMoonStr[2];
$moonSpeed = $newMoonStr[3];
echo "<b>Moon's Data : </b>";
echo "<span style='color:red'>Date Input =</span> " . $name . "<br>";
echo "<span style='color:red'>Date UTC Date Moon =</span> " . $utcDateMoon . "<br>";
echo "<span style='color:red'>Planet Name =</span> " . $moonName . "<br>";
echo "<span style='color:red'>Moon Angle =</span> " . $moonAngle . "<br>";
echo "<span style='color:red'>Moon Speed =</span> " . $moonSpeed . "<br>";
echo "<br><br>";
//Calculation of Angular distance between Moon and Sun
if ($moonAngle < $sunAngle)
{
	$moonAngle = $moonAngle + 360;
}
$moonSunAngularDistance = $moonAngle - $sunAngle;
echo "<br><b>moon-Sun-Angular-Distance =</b> " . $moonSunAngularDistance;//to be deleted
//Speed difference between moon and Sun
$speedDifference = $moonSpeed - $sunSpeed;
echo "<br><b>Speed diff Moon - Sun = </b>" . $speedDifference;
//Calculation of tithi
$tithi1 = $moonSunAngularDistance/12;
echo "<br><b>tithi cal 1 = </b>" . $tithi1;
//getting integer part of tithi
$tithi2 = floor($tithi1);
echo "<br><b>Integer part of tithi = </b>" . $tithi2;
//getting fractional part
$tithi3 = $tithi1 - $tithi2;
echo "<br><b>Fractional part of tithi = </b>" . $tithi3;
//calculation of fractional part to be elapsed after tithi
$tithi4 = 1 - $tithi3;
echo "<br><b>Fractional part of tithi to be elapsed = </b>" . $tithi4;
//left part after converting to *12
$tithi5 = $tithi4 * 12;
echo "<br><b>Fractional part of tithi to be elapsed after *12 = </b>" . $tithi5;
//calculation of duration of tithi left
$tithi6 = $tithi5 * 24 / $speedDifference;
echo "<br><b>Time Left to complete tithi = </b>" . $tithi6;
//Calculation of time of ending of tithi
$tithi7 = $tithi6 + 5.5;
echo "<br><b>Time Ending of Tithi = </b>" . $tithi7;
// calculation if tithi is skipped
if ($tithi7< $newSunRise){
	$sunString = $output[2];
$newSunStr = explode(",", $sunString);
$utcDateSun = $newSunStr[0];
$sunName = $newSunStr[1];
$sunAngle = $newSunStr[2];
$sunSpeed = $newSunStr[3];
echo "<b>Sun's Data : </b>";
echo "<span style='color:red'>Date Input =</span> " . $name . "<br>";
echo "<span style='color:red'>Date UTC Date Sun =</span> " . $utcDateSun . "<br>";
echo "<span style='color:red'>Planet Name =</span> " . $sunName . "<br>";
echo "<span style='color:red'>Sun Angle =</span> " . $sunAngle . "<br>";
echo "<span style='color:red'>Sun Speed =</span> " . $sunSpeed . "<br>";
//Moon statistics
$moonString = $output[3];
$newMoonStr = explode(",", $moonString);
$utcDateMoon = $newMoonStr[0];
$moonName = $newMoonStr[1];
$moonAngle = $newMoonStr[2];
$moonAngle1= $newMoonStr[2];
$moonSpeed = $newMoonStr[3];
echo "<b>Moon's Data : </b>";
echo "<span style='color:red'>Date Input =</span> " . $name . "<br>";
echo "<span style='color:red'>Date UTC Date Moon =</span> " . $utcDateMoon . "<br>";
echo "<span style='color:red'>Planet Name =</span> " . $moonName . "<br>";
echo "<span style='color:red'>Moon Angle =</span> " . $moonAngle . "<br>";
echo "<span style='color:red'>Moon Speed =</span> " . $moonSpeed . "<br>";
echo "<br><br>";
//Calculation of Angular distance between Moon and Sun
if ($moonAngle < $sunAngle)
{
	$moonAngle = $moonAngle + 360;
}
$moonSunAngularDistance = $moonAngle - $sunAngle;
echo "<br><b>moon-Sun-Angular-Distance =</b> " . $moonSunAngularDistance;//to be deleted
//Speed difference between moon and Sun
$speedDifference = $moonSpeed - $sunSpeed;
echo "<br><b>Speed diff Moon - Sun = </b>" . $speedDifference;
//Calculation of tithi
$tithi1 = $moonSunAngularDistance/12;
echo "<br><b>tithi cal 1 = </b>" . $tithi1;
//getting integer part of tithi
$tithi2 = floor($tithi1);
echo "<br><b>Integer part of tithi = </b>" . $tithi2;
//getting fractional part
$tithi3 = $tithi1 - $tithi2;
echo "<br><b>Fractional part of tithi = </b>" . $tithi3;
//calculation of fractional part to be elapsed after tithi
$tithi4 = 1 - $tithi3;
echo "<br><b>Fractional part of tithi to be elapsed = </b>" . $tithi4;
//left part after converting to *12
$tithi5 = $tithi4 * 12;
echo "<br><b>Fractional part of tithi to be elapsed after *12 = </b>" . $tithi5;
//calculation of duration of tithi left
$tithi6 = $tithi5 * 24 / $speedDifference;
echo "<br><b>Time Left to complete tithi = </b>" . $tithi6;
//Calculation of time of ending of tithi
$tithi7 = $tithi6 + 5.5;
echo "<br><b>Time Ending of Tithi (This is for skippted tithi)= </b>" . $tithi7;
}
$endTimeH = floor($tithi7);
$endTimeM = ($tithi7 - $endTimeH)*60;
$endTimeM1 = floor($endTimeM);
$endTimeS = floor(($endTimeM - $endTimeM1)*60);
echo "<br><b>Time Ending of Tithi = </b>" . $endTimeH . ":" . $endTimeM1 . ":" . $endTimeS . "hour<br>";
include 'impFiles/tithiNames.php'; //tithiNames
echo "Ending Time : " . dtimetotime($tithi6) . "<br><br>";
//Calculation of Nakshatra
$nakshatra = $moonAngle1/13.3333;
$nakshatra_int = floor($nakshatra);
$nakshatra_frac = $nakshatra - $nakshatra_int;
$nakshatra_frac_left = 1 - $nakshatra_frac;
$nakshatra_endTime = $nakshatra_frac_left * 24 * 13.3333/$moonSpeed;
echo "Moon Angle : " . $moonAngle1 . "<br>";
echo "Nakshatra :" . $nakshatra . "<br>";
echo "Nakshatra Int :" . $nakshatra_int . "<br>";
echo "Nakshatra fraction:" . $nakshatra_frac . "<br>";
echo "Nakshatra fraction left:" . $nakshatra_frac_left . "<br>";
echo "Nakshatra endtime:" . $nakshatra_endTime . "<br>";
include 'impFiles/nakshatraNames.php'; //nakshatraNames
echo "Ending Time :" . dtimetotime($nakshatra_endTime) . "<br>";
/*
$speedDifference = $moonSpeed - $sunSpeed;
echo "<br><b>Speed diff Moon - Sun = </b>" . $speedDifference;
//Calculation of tithi
$tithi1
*/
//Calculation of Karan
$karan_number = karan_cal($tithi1);//call of karan calculation function
$karanTime = karan_time($tithi1, $speedDifference);
include 'impFiles/karanNames.php'; //nakshatraNames
echo "Ending Time :" . dtimetotime($karanTime) . "<br>";
//Calculation of Yoga
$sumSunMoonAngle = $sunAngle + $moonAngle1;
if ($sumSunMoonAngle > 360){
	$sumSunMoonAngle = $sumSunMoonAngle - 360;
} else {
	$sumSunMoonAngle = $sumSunMoonAngle;
}
$yoga = $sumSunMoonAngle/13.333333;
$yogaNumber = floor($yoga);
$yogaFrac = $yoga - $yogaNumber;
$yogaFracLeft = 1 - $yogaFrac;
$sumSunMoonSpeed = $sunSpeed + $moonSpeed;
$timeLeftToCompleteYoga = $yogaFracLeft * 13.333333 * 24/$sumSunMoonSpeed;
$timeStartOfYoga = $yogaFrac * 13.333333 * 24/$sumSunMoonSpeed;
echo $sumSunMoonAngle . ":" . "This is sum of sun and moons angle" . "<br>";
echo $yoga . ":" . "This is yoga after division by 13.3333" . "<br>";
echo $yogaNumber . ":" . "This is yoga Number" . "<br>";
echo $timeLeftToCompleteYoga . ":" . "Time left to complete yoga" . "<br>";
echo $timeStartOfYoga . ":" . "This is start time of yoga" . "<br>";
include 'impFiles/yogaNames.php'; //Yoga Names
echo "Yoga End Time :" . " " . dtimetotime($timeLeftToCompleteYoga) . "<br>";
echo "Yoga Starting Time :" . " " . dtimetotime($timeStartOfYoga) . "<br>";
//echo of moon and sun position after explode


print_r($newSunStr);
echo "<br><br>";
print_r($newMoonStr); 
echo "<br><br>";
//Calculation of tithi
echo "<br><br><br>";
echo '<pre>',print_r($output,1),'</pre>';
echo "<br><br>Sun Rise Time <br>";
echo '<pre>',print_r($sr,1),'</pre>';
echo "<br><br>moon Rise Time <br>";
echo '<pre>',print_r($mr,1),'</pre>';
?>
