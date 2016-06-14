<?php
  session_start();
  $db = new SQLITE3("sql/database.db");

  // Get all bill details from the database
  $billId = $_GET["billId"];
  $results = $db->query("SELECT * FROM bills WHERE id=$billId");
  $row = $results->fetchArray();

  $name = $row["name"];
  $amount = $row["amount"];
  $dueDate = $row["dueDate"];
  $description = $row["description"];
  $isPaid = $row["isPaid"];

  // get author ID
  $authorId = $row["authorId"];
  $userId = $_SESSION["id"];

  $authorResults = $db->query("SELECT * FROM users WHERE id=$authorId");
  $authorRow = $authorResults->fetchArray();
  $authorPayPal = $authorRow["payPal"];

  if ($row["userId"] != $userId) {
    header("Location: my_bills.php");
  }
  else {
    // if the author is the same as the current user, change the name accordingly
    if ($authorId == $userId) {
      $userName = "You";
    }
    else {
      $results = $db->query("SELECT * FROM users WHERE id=$authorId");
      $row = $results->fetchArray();
      $userName = $row["firstName"]." ".$row["lastName"];
    }

    echo "<div class='col-sm-8 text-left'><ul class='list-group'>";
    echo "<li class='list-group-item active'>Bill Name: ".$name."</li>";
    echo "<li class='list-group-item active'>Amount: ".$amount."</li>";
    echo "<li class='list-group-item active'>Due Date: ".$dueDate."</li>";
    echo "<li class='list-group-item active'>Payer: ".$userName."</li>";
    echo "<li class='list-group-item active'>Description: ".$description."</li>";
    echo "</ul></div>";

    echo "<div class='col-sm-4 text-left'>";
    if ($isPaid == 0) {
      if ($authorId == $_SESSION["id"]) {
        echo "";
      }
      else {
        echo "<form name='markAsPaid' action='process_mark_paid.php' method='post'>";
        echo "<input type='hidden' name='billId' value='".$billId."'>";
        echo "<input type='submit' name='markAsPaid' class='btn btn-primary' value='Mark Bill as Paid'>";
        echo "<label class='control-label' for='markAsPaid'>(use after paying through PayPal or other ways)</label>";
        echo "</form><br>";
        echo "<form name='payPal' action='https://www.paypal.me/".$authorPayPal."/send?amount=".$amount."&currencyCode=GBP' target='_blank'>";
        echo "<input type='submit' class='btn btn-primary' value='Pay Bill by PayPal.me'";
        if ($authorPayPal == null) {
          echo "disabled";
        }
        echo ">";
        echo "<label class='control-label' for='payPal'>(requires a PayPal.me link)</label>";
        echo "</form><br>";
      }
    }

    echo "<form action='my_bills.php'><input type='submit' class='btn btn-primary' value='Go back'></form></div>";
  }


?>
