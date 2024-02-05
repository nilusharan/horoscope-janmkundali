<?php
//sun rise time to local time calculation

function decimalHours($time,$tz)
{
    $hms = explode(":", $time);
    $hms = ($hms[0] + ($hms[1]/60) + ($hms[2]/3600))+$tz;
    $hms = date('H:i:s', floor($hms * 3600));
    return $hms;
}
function hourToDecimal($time,$tz)
{
	$hms = explode(":", $time);
    $hms = ($hms[0] + ($hms[1]/60) + ($hms[2]/3600))+$tz;
	return $hms;
}
function decimalTimeToHms($time)
{
	$timeHour = floor($time);
	$timeFracHourLeft = $time - $timeHour;
	$timeMinuteDecimal = $timeFracHourLeft * 60;
	$timeMinute = floor($timeMinuteDecimal);
	$timeSecond = floor(($timeMinuteDecimal - $timeMinute)*60);
	$timeProcessed = $timeHour . "hour" . " " . $timeMinute . "min" . " " . $timeSecond . "sec";
	return $timeProcessed;
	
}
function startTime($timeE,$sR,$date)
{
	if ($timeE > $sR)
	{
		$stime_elapsed = $sR + 24 - $timeE;
		$timeInHour = floor($stime_elapsed);
		$timeFractionInMin = $stime_elapsed - $timeInHour;
		$timeInMinute = floor($timeFractionInMin);
		$timeInSecond = floor(($timeFractionInMin - $timeInMinute)*60);
		$timeProcessed = $timeInHour . ":" . $timeInMinute . ":" . $timeInSecond . " " . "hour";
		//claculation of date
		$date1 = strtotime("-1 days", strtotime($date));
			$date2 = date("d-m-Y", $date1);
		$startTD = $date2 . " " . "at" . " " . $timeProcessed;
		return $startTD;
	}
	else
	{
		$stime_elapsed = $sR - $timeE;
		$timeInHour = floor($stime_elapsed);
		$timeFractionInMin = $stime_elapsed - $timeInHour;
		$timeInMinute = floor($timeFractionInMin);
		$timeInSecond = floor(($timeFractionInMin - $timeInMinute)*60);
		$timeProcessed = " " . $timeInHour . ":" . $timeInMinute . ":" . $timeInSecond . " " . "hour";
		return $timeProcessed;
	}
}
 
