<?php 
include("inc/data.inc.php");

if (!empty($_POST)) {

  var_dump($_POST);
  if (key($_POST) == "show") {
    $result = $pdo->exec("UPDATE experience SET id_person = 1 WHERE id_experience = '$_POST[show]';");
  } elseif (key($_POST) == "hide") {
    $result = $pdo->exec("UPDATE experience SET id_person = NULL WHERE id_experience = '$_POST[hide]';");
  } elseif (key($_POST) == "delete") {
    $result = $pdo->exec("DELETE FROM experience WHERE id_experience = '$_POST[delete]';");
  }
  header("Location: admin.php");
  exit();
}