<?php
  session_start();
  $db = new SQLITE3("sql/database.db");
  $currentUserId = $_SESSION["id"];

  // if no user is logged in, enlarge the main area instead
  if (!isset($currentUserId)) {
    echo "<script>document.getElementById('mainArea').className = 'col-sm-12 text-left';</script>";
  }
  else {
    echo "<div class='col-sm-2 sidenav' id='right-nav'>";

    $results = $db->query("SELECT payPal FROM users WHERE id=$currentUserId");
    $row = $results->fetchArray();
    $payPal = $row["payPal"];

    if ($payPal == "") {
      echo "<table class='table table-hover'><tbody><tr class='warning text-warning'><td><span class='glyphicon glyphicon-exclamation-sign'></span><a href='account_settings.php' class=''> Click here to add a PayPal link to your account.</a></td></tr></tbody></table>";
    }

    echo "<p>Notifications</p><hr>";

    echo "<table class='table table-hover'><tbody>";

    // get all notifications for the current user
    $results = $db->query("SELECT * FROM notifications WHERE receiverId=$currentUserId ORDER BY postDate DESC");

    // get all notifications for the current user
    while (($row = $results->fetchArray())) {
      $description = $row["description"];
      $type = $row["type"];

      if ($type == 0) {
        $class = "info text-info";
        $icon = "glyphicon glyphicon-exclamation-sign";
      }
      else {
        $class ="success text-success";
        $icon = "glyphicon glyphicon-ok-sign";
      }
      echo "<tr class='".$class."'><td><span class='".$icon."'></span> ".$description."</td></tr>";
    }
    echo "</tbody></table></div>";
  }
?>
