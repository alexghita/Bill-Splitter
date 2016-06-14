<?php
  // email information
  $to = "A.Ghita@warwick.ac.uk";
  $from = $_POST["email"];
  $subject = "BillSplitter Contact";
  $message = $_POST["message"];
  $headers = "From: ".$from;

  //send email
  mail($to, $subject, $message, $headers);

  header("Location: contact_thankyou.php");
?>
