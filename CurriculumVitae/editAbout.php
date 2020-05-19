<?php
include('inc/data.inc.php');

if(!empty($_POST)) {
  $name = "profile.";
  $sqlForImg = "";

  if (!empty($_FILES)) {
    foreach ($_FILES["profile_picture"]["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["profile_picture"]["tmp_name"][$key];
        $name .= pathinfo($_FILES["profile_picture"]["name"][$key], PATHINFO_EXTENSION);
        move_uploaded_file($tmp_name, "img/$name");
        $sqlForImg = ", picture_path = 'img/$name'";
      }
    }

    $_POST["firstname"] = htmlentities($_POST["firstname"], ENT_QUOTES);    
    $_POST["lastname"] = htmlentities($_POST["lastname"], ENT_QUOTES);    
    $_POST["about_text"] = htmlentities($_POST["about_text"], ENT_QUOTES);

    $sql = "UPDATE person SET firstname = '$_POST[firstname]', lastname = '$_POST[lastname]', address = '$_POST[address]', email = '$_POST[email]', telephone = '$_POST[telephone]', about_text = '$_POST[about_text]'$sqlForImg WHERE id_person = 1;";
    $result = $pdo->exec($sql);
    echo $sql;
  }

  header('Location: admin.php');
  exit();
}