<?php
  session_start();

  $db = new SQLite3("sql/database.db");
  $currentUserId = $_SESSION["id"];
  $results = $db->query("SELECT * FROM users WHERE id != $currentUserId");

  while (($row = $results->fetchArray())) {
     echo "<li><input type='checkbox' id='".$row["id"]."' name='payers[]' value='".$row["email"]."'><label for='".$row["id"]."'>".$row["firstName"]." ".$row["lastName"]."</label></li>";
  }
?>
