<?php
  include "security.php";
  $db = new SQLite3("sql/database.db");

  // get the data posted from the form
  $email = secure($_POST["email"]);
  $password = secure($_POST["password"]);

  $query = $db->prepare("SELECT * FROM users WHERE email=:email");
  $query->bindValue(":email", $email, SQLITE3_TEXT);
  $results = $query->execute();
  $row = $results->fetchArray();

  // encrypt the password with the corresponding salt
  $salt = $row["salt"];
  $encryptedPassword = sha1($salt."--".$password);
  $correctPassword = $row["password"];

  // check if the passwords match
  if ($encryptedPassword == $correctPassword) {
    session_start();
    $_SESSION["id"] = $row["id"];
    header("Location: my_bills.php");
    exit();
  }

  header("Location: login.php");
?>
