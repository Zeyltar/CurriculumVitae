<?php

$pdo = new PDO("mysql:host=localhost;dbname=cv_site", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

function convert_date($date) {
  if (empty($date) || $date == "0000-00-00") {
    return "Maintenant";
  }
  
  $frMonthNames = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
  
  $parsedDate = date_parse_from_format("Y-m-d", $date);
  $dateObj   = DateTime::createFromFormat('!m', $parsedDate["month"]);
  $monthName = $dateObj->format('F');

  return str_ireplace($monthName, $frMonthNames[$parsedDate["month"]-1], $monthName . " " . $parsedDate["year"]);
}