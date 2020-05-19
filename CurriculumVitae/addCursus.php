<?php
include("inc/data.inc.php");

if (!empty($_POST)) {

  $_POST["cursus_title"] = htmlentities($_POST["cursus_title"], ENT_QUOTES);
  $_POST["establishment_name"] = htmlentities($_POST["establishment_name"], ENT_QUOTES);
  $_POST["cursus_about_text"] = htmlentities($_POST["cursus_about_text"], ENT_QUOTES);

  $result = $pdo->exec("INSERT INTO cursus (id_person, title, establishment_name, start_date, end_date, about_text) VALUES (1, '$_POST[cursus_title]', '$_POST[establishment_name]', '$_POST[cursus_start_date]', '$_POST[cursus_end_date]', '$_POST[exp_about_text]'); ");
  header("Location: admin.php");
  exit();
}