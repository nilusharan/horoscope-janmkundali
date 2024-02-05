<?php 
$libPath = '../sweph/ephe/';
putenv("PATH=$libPath");
//date_default_timezone_set("Asia/Kolkata");
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
echo "<br>This date after formating: " . $name;
exec ("swetest -edir$libPath -b$date -ut$00:00 -p01 -sid1 -eswe -topo$longitude,$latitude,0 -n5 -fPlsZGj -g -head", $output);
exec ("swetest -p1 -d0 -b$date -ut00:00 -sid1 -eswe -topo$longitude,$latitude,0 -n31 -fPTls -g -head",$smdistance);
//exec ("swetest -edir$libPath -b$date -ut$time -p0123456789DAHFIGttt -sid1 -eswe -house$longitude,$latitude,$h_sys -fPlsgj -g", $output);
//exec ("swetest -edir$libPath -b$date -ut$time -p012 -eswe -g", $output);
//exec ("swetest -edir$libPath -b$name -p012 -g", $output1);
//exec ("swetest -edir$libPath -b$name -p01234567t -g", $output1);
echo '<pre>',print_r($output,1),'</pre>';
echo '<pre>',print_r($smdistance,1),'</pre>';

?>
