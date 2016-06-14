<?php
  include "security.php";
  session_start();
  $db = new SQLite3("sql/database.db");

  // get the data posted from the form
  $firstName = secure($_POST["firstName"]);
  $lastName = secure($_POST["lastName"]);
  $password = secure($_POST["password"]);
  $payPal = secure($_POST["payPal"]);
  $id = $_SESSION["id"];

  // encrypt the password
  $salt = time();
  $encryptedPassword = sha1($salt."--".$password);

  // make the required changes
  if ($firstName != "") {
    $query = $db->prepare("UPDATE users SET firstName=:firstName WHERE id=$id");
    $query->bindValue(":firstName", $firstName, SQLITE3_TEXT);
    $query->execute();
  }
  if ($lastName != "") {
    $query = $db->prepare("UPDATE users SET lastName=:lastName WHERE id=$id");
    $query->bindValue(":lastName", $lastName, SQLITE3_TEXT);
    $query->execute();
  }
  if ($password != "") {
    $query = $db->prepare("UPDATE users SET password=:encryptedPassword, salt=:salt WHERE id=$id");
    $query->bindValue(":encryptedPassword", $encryptedPassword, SQLITE3_TEXT);
    $query->bindValue(":salt", $salt, SQLITE3_TEXT);
    $query->execute();
  }
  if ($payPal != "") {
    $query = $db->prepare("UPDATE users SET payPal=:payPal WHERE id=$id");
    $query->bindValue(":payPal", $payPal, SQLITE3_TEXT);
    $query->execute();
  }

  header('Location: index.php');
?>
