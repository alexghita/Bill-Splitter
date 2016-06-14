<?php
  session_start();

  $id = $_SESSION["id"];
  $html = "<ul class='nav navbar-nav'><li id='navHome'><a href='index.php'>Home</a></li>";

  // if logged in, add a "My Bills" tab, otherwise add a "Register" tab
  if (isset($id)) {
    $html .= "<li id='navMyBills'><a href='my_bills.php'>My Bills</a></li>";
  }
  else {
    $html .= "<li id='navRegister'><a href='register.php'>Register</a></li>";
  }

  $html .= "<li id='navAbout'><a href='about.php'>About</a></li>";
  $html .= "<li id='navContact'><a href='contact.php'>Contact</a></li></ul>";
  $html .= "<ul class='nav navbar-nav navbar-right'>";

  /*
   * if logged in, add an "Add Bill" tab, an "Account Settings" tab and a "Logout" button to the right;
   * otherwise add a "Login" tab
   */
  if (isset($id)) {
    $html .= "<li id='navAddBill'><a href='add_bill.php'><span class='glyphicon glyphicon-plus-sign'></span> Add Bill</a></li>";
    $html .= "<li id='navAccountSettings'><a href='account_settings.php'><span class='glyphicon glyphicon-cog'></span> Account Settings</a></li>";
    $html .= "<li id='navLogout'><a href='process_logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
  }
  else {
    $html .= "<li id='navLogin'><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
  }

  $html .= "</ul>";

  echo $html;
?>
