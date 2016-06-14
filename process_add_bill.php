<?php
  include "security.php";
  session_start();
  $db = new SQLITE3("sql/database.db");

  // add a bill to the database with the given parameters
  function addBill($payerEmail, $billName, $amount, $dueDate, $billDescription, $isPaid, $authorId, $authorPayPal) {
    global $db;

    // get payer's ID
    $query = $db->prepare("SELECT id FROM users WHERE email=:payerEmail");
    $query->bindValue(":payerEmail", $payerEmail, SQLITE3_TEXT);
    $results = $query->execute();
    $row = $results->fetchArray();
    $payerId = $row["id"];

    $emailQuery = $db->query("SELECT email FROM users WHERE id=$payerId");
    $emailRow = $emailQuery->fetchArray();
    // get email details
    $to = $emailRow["email"];
    $from = "noreply@billsplitter.cw.cs139";
    $subject = "New Bill - BillSplitter";
    $headers = "From: ".$from;

    // add the bill to the corresponding payer
    $query = $db->prepare("INSERT INTO bills VALUES(NULL, :billName, :amount, :dueDate, :payerId, :authorId, :isPaid, :billDescription, :authorPayPal)");
    $query->bindValue(":billName", $billName, SQLITE3_TEXT);
    $query->bindValue(":amount", $amount, SQLITE3_FLOAT);
    $query->bindValue(":dueDate", $dueDate, SQLITE3_TEXT);
    $query->bindValue(":payerId", $payerId, SQLITE3_INTEGER);
    $query->bindValue(":authorId", $authorId, SQLITE3_INTEGER);
    $query->bindValue(":isPaid", $isPaid, SQLITE3_INTEGER);
    $query->bindValue(":billDescription", $billDescription, SQLITE3_TEXT);
    $query->bindValue(":authorPayPal", $authorPayPal, SQLITE3_TEXT);
    $query->execute();

    if ($payerId != $authorId) {
      // get author name
      $query = $db->prepare("SELECT * FROM users WHERE id=:authorId");
      $query->bindValue(":authorId", $authorId, SQLITE3_INTEGER);
      $results = $query->execute();
      $row = $results->fetchArray();
      $authorName = $row["firstName"]." ".$row["lastName"];
      $today = date("Y-m-d");
      $description = $authorName." added a new bill: ".$billName.", due by ".$dueDate.".";
      $message = $description." Click here to check it out: http://cs139.dcs.warwick.ac.uk/~u1504815/cs139/coursework/";

      // add notification
      $query = $db->prepare("INSERT INTO notifications VALUES(NULL, :description, :today, :payerId, 0)");
      $query->bindValue(":description", $description, SQLITE3_TEXT);
      $query->bindValue(":today", $today, SQLITE3_TEXT);
      $query->bindValue(":payerId", $payerId, SQLITE3_INTEGER);
      $query->execute();

      //send email
      mail($to, $subject, $message, $headers);
    }
  }

  // get the data posted from the form
  $billName = secure($_POST["billName"]);
  $amount = secure($_POST["amount"]);
  $dueDate = secure($_POST["dueDate"]);
  $billDescription = secure($_POST["billDescription"]);

  // split the bill price
  $payerCount = 1;
  foreach ($_POST["payers"] as $payer) {
    $payerCount++;
  }
  $originalAmount = round($amount, 2);
  $amount = round($amount / $payerCount, 2);

  // add the bill for the bill author to the database
  $authorId = $_SESSION["id"];
  $results = $db->query("SELECT * FROM users WHERE id=$authorId");
  $row = $results->fetchArray();
  $inputEmail = $row["email"];
  $payerEmail = secure($inputEmail);
  $authorPayPal = $row["payPal"];
  addBill($payerEmail, $billName, $originalAmount, $dueDate, $billDescription, 0, $authorId, $authorPayPal);

  // add the bill for each selected payer to the database
  foreach ($_POST["payers"] as $payer) {
    // get payer
    $payerEmail = secure($payer);
    addBill($payerEmail, $billName, $amount, $dueDate, $billDescription, 0, $authorId, $authorPayPal);
  }

  header("Location: my_bills.php");
?>
