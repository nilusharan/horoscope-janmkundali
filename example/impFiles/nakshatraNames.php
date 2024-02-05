<?php
echo "<br><b>Nakshatra</b>:&nbsp;<span style='color:red; background-color:yellow;'>";
switch ($nakshatra_int) {
  case 0:
    echo "Ashwini, Lord: Ketu";
	break;
  case 1:
    echo "Bharni, Lord: Venus";
    break;
  case 2:
    echo "Kritika, Lord: Sun";
    break;
  case 3:
    echo "Rohini, Lord: Moon";
    break;
  case 4:
    echo "Mrigshira, Lord: Mars";
	break;
  case 5:
    echo "Aridra, Lord: Rahu";
    break;
  case 6:
    echo "Punarvasu, Lord: Jupiter";
    break;
  case 7:
    echo "Pushya (Lord: Saturn)";
    break;
  case 8:
    echo "Ashlesha (Lord: Mercury)";
    break;
  case 9:
    echo "Magha (Lord: Ketu)";
    break;
  case 10:
    echo "Purva-Phalguni (Lord: Venus)";
    break;
  case 11:
    echo "Uttra-Phalguni (Lord: Sun)";
    break;
  case 12:
    echo "Hasta (Lord: Moon)";
    break;
  case 13:
    echo "Chitra (Lord: Mars)";
    break;
  case 14:
    echo "Swati (Lord: Rahu)";
    break;
  case 15:
    echo "Vishakha (Lord: Jupiter)";
    break;
  case 16:
    echo "Anuradha (Lord: Saturn)";
    break;
  case 17:
    echo "Jyestha (Lord: Mercury)";
    break;
  case 18:
    echo "Moola (Lord: Ketu)";
    break;
  case 19:
    echo "Purva-shadh (Lord: Venus)";
    break;
  case 20:
    echo "Uttra-shadh (Lord: Sun)";
    break;
  case 21:
    echo "Shravana (Lord: Moon)";
    break;
  case 22:
    echo "Dhanishtha (Lord: Mars)";
    break;
  case 23:
    echo "Shatvisha (Rahu)";
    break;
  case 24:
    echo "Poorva-Bhadra-Pada (Lord: Jupiter)";
    break;
  case 25:
    echo "Uttra-Bhadra-Pada (Lord: Saturn)";
    break;
  case 26:
    echo "Revati (Lord: Mercury)";
    break;  
  default:
    echo "Nakshatras of Hindu Calender";
}
echo "</span><br>";
?>