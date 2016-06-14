<?php
  $billId = $_POST["id"];
	$db = new SQLite3("sql/database.db");

	$db->exec("DELETE FROM bills WHERE id=$billId");
?>
