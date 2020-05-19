<?php
include("inc/data.inc.php");

if (!empty($_POST)) {

  $_POST["exp_title"] = htmlentities($_POST["exp_title"], ENT_QUOTES);
  $_POST["company_name"] = htmlentities($_POST["company_name"], ENT_QUOTES);
  $_POST["exp_about_text"] = htmlentities($_POST["exp_about_text"], ENT_QUOTES);

  $result = $pdo->exec("INSERT INTO experience (id_person, title, company_name, start_date, end_date, about_text) VALUES (1, '$_POST[exp_title]', '$_POST[company_name]', '$_POST[exp_start_date]', '$_POST[exp_end_date]', '$_POST[exp_about_text]'); ");
  header("Location: admin.php");
  exit();
}