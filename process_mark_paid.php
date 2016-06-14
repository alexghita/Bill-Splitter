<?php
  $billId = $_POST["billId"];
	$db = new SQLite3('sql/database.db');

  // update bill status
	$db->exec("UPDATE bills SET isPaid=1 WHERE id=$billId");

  // prepare payment notification details
  $results = $db->query("SELECT * FROM bills WHERE id=$billId");
  $row = $results->fetchArray();
  $billName = $row["name"];
  $authorId = $row["authorId"];
  $today = date("Y-m-d");
  $payerId = $row["userId"];
  $results = $db->query("SELECT * FROM users WHERE id=$payerId");
  $row = $results->fetchArray();
  $payerName = $row["firstName"]." ".$row["lastName"];
  $description = $payerName." paid for ".$billName." on ".$today.".";

  // get email details
  $emailQuery = $db->query("SELECT email FROM users WHERE id=$authorId");
  $emailRow = $emailQuery->fetchArray();
  $to = $emailRow["email"];
  $from = "noreply@billsplitter.cw.cs139";
  $subject = "Bill Payment - BillSplitter";
  $headers = "From: ".$from;
  $message = $description." Click here to check it out: http://cs139.dcs.warwick.ac.uk/~u1504815/cs139/coursework/";

  //send email
  mail($to, $subject, $message, $headers);

  // add notification to database
  $query = $db->prepare("INSERT INTO notifications VALUES(NULL, :description, :today, :authorId, 1)");
  $query->bindValue(":description", $description, SQLITE3_TEXT);
  $query->bindValue(":today", $today, SQLITE3_TEXT);
  $query->bindValue(":authorId", $authorId, SQLITE3_INTEGER);
  $query->execute();

  header("Location: my_bills.php");
?>
