<?php
  session_start();

  $db = new SQLITE3("sql/database.db");
  $currentUserId = $_SESSION["id"];
  $results = $db->query("SELECT * FROM bills WHERE userId = $currentUserId ORDER BY id DESC");
  $today = date("Y-m-d");
  $billCount = 0;

  while (($row = $results->fetchArray())) {
    // if the bill is paid, output will be green
    if ($row["isPaid"] == 1) {
      $class = "success text-success";
      $icon = "glyphicon glyphicon-ok-sign";
      $text = " Paid";
      $button = "btn btn-success btn-xs";
    }
    // if this is the person that must pay the bill, the output will be blue
    elseif ($row["userId"] == $row["authorId"]) {
      $class = "info text-info";
      $icon = "glyphicon glyphicon-star";
      $text = " Payer";
      $button = "btn btn-info btn-xs";
    }
    // else, if the bill is overdue, the output will be red
    elseif ($row["dueDate"] < $today) {
      $class = "danger text-danger";
      $icon = "glyphicon glyphicon-exclamation-sign";
      $text = " Overdue";
      $button = "btn btn-danger btn-xs";
    }
    // else, if the bill is pending, the output will be yellow
    else {
      $class ="warning text-warning";
      $icon = "glyphicon glyphicon-info-sign";
      $text = " Pending";
      $button = "btn btn-warning btn-xs";
    }

    // print a table row containing the bill's name, amount to be paid, due date, status, and review button
    echo "<tr class='".$class."' id='".$row["id"]."'><td>".$row["name"]."</td><td>&pound; ".$row["amount"]."</td><td>".$row["dueDate"]."</td><td><span class='".$icon."'>".$text."</span></td><td class='text-right'>";
    if ($text == " Paid" || $text == " Payer") {
      echo "<div class='".$button." removeBill'>Remove Bill</div>";
    }
    echo "</td><td class='text-right'><form name='viewBill' action='view_bill.php' method='get'><input type='hidden' name='billId' value='".$row["id"]."'><input type='submit' class='".$button."' value='View Bill'></form></td></tr>";

    // store the number of bills displayed
    $billCount++;
  }

  // create an invisible input that helps JavaScript read the bill count to resize the page properly
  echo "<input type='hidden' id='getBillCount' value='".$billCount."'>";
?>
