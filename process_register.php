<?php
  include "security.php";
  $db = new SQLite3("sql/database.db");

  // get the data posted from the form
  $firstName = secure($_POST["firstName"]);
  $lastName = secure($_POST["lastName"]);
  $email = secure($_POST["email"]);
  $password = secure($_POST["password"]);

  // encrypt the password
  $salt = time();
  $encryptedPassword = sha1($salt."--".$password);

  // check if the email is already in use - maybe it can be changed with AJAX?
  $query = $db->prepare("SELECT * FROM users WHERE email=:email");
  $query->bindValue(":email", $email, SQLITE3_TEXT);
  $results = $query->execute();
  $row = $results->fetchArray();
  $duplicateTest = $row["id"];

  // if the email is already in use, redirect to registration page
  if (isset($duplicateTest)) {
    header("Location: register.php");
    exit();
  }

  // add the user to the database
  $query = $db->prepare("INSERT INTO users VALUES(NULL, :firstName, :lastName, :email, :encryptedPassword, '', :salt)");
  $query->bindValue(":firstName", $firstName, SQLITE3_TEXT);
  $query->bindValue(":lastName", $lastName, SQLITE3_TEXT);
  $query->bindValue(":email", $email, SQLITE3_TEXT);
  $query->bindValue(":encryptedPassword", $encryptedPassword, SQLITE3_TEXT);
  $query->bindValue(":salt", $salt, SQLITE3_TEXT);
  $query->execute();

  // start a new session for this user and redirect to homepage
  session_start();
  $query = $db->prepare("SELECT * FROM users WHERE email=:email");
  $query->bindValue(':email', $email, SQLITE3_TEXT);
  $results = $query->execute();
  $row = $results->fetchArray();
  $_SESSION["id"] = $row["id"];

  header('Location: my_bills.php');
?>
