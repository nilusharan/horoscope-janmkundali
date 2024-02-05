<?php
echo "<br><b>Month</b>:&nbsp;<span style='color:red; background-color:yellow;'>";
switch ($monthNumbers) {
  case 0:
    echo "Chaitra";
	break;
  case 1:
    echo "Vaisakh";
    break;
  case 2:
    echo "Jyestha";
    break;
  case 3:
    echo "Aashadha";
    break;
  case 4:
    echo "Shravan";
	break;
  case 5:
    echo "Bhadrapada";
    break;
  case 6:
    echo "Aswina";
    break;
  case 7:
    echo "Kartika";
    break;
  case 8:
    echo "Agrahayan";
    break;
  case 9:
    echo "Pausha";
    break;
  case 10:
    echo "Magha";
    break;
  case 11:
    echo "Phalgun";
    break;  
  default:
    echo "Name of Months of Hindu Calender";
}
echo "</span>";
?>