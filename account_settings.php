<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Settings | BillSplitter</title>
    <!-- if the user is not logged in and tries to access this page, redirect to homepage -->
    <?php include "process_redirect_unlogged.php" ?>
    <!-- insert Bootstrap, custom CSS, jQuery -->
    <?php include "layout/head.php" ?>
    <!-- insert JavaScript form validation for this page's form -->
    <script src="js/validate_update.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>
    <!-- insert header -->
    <?php include "layout/jumbotron.php" ?>
    <?php include "layout/nav.php" ?>

    <!-- main content area -->
    <div class="container-fluid text-center" id="main">
      <div class="row content" id="mainRow">
        <div class="col-sm-10 text-left" id="mainArea">
          <h1>Account Settings</h1>
          <p>
            Here you can modify your account name, your password and your PayPal link (or add one if you haven't done so yet).
          </p>
          <hr>

          <!-- display form errors here from JavaScript validation -->
          <div class="row"><div id="errorBox"></div></div>

          <form class="form-horizontal" role="form" name="updateForm" action="process_update.php" method="post" onsubmit="return validateUpdate()">
            <!-- PayPal link input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="payPal">PayPal Link:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" name="payPal" class="form-control" id="payPal" placeholder="Enter PayPal link">
              </div>
              <label class="control-label col-sm-0" for="payPal">(without the paypal.me/ part)</label>
            </div>

            <!-- first name input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="firstName">First Name:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter first name">
              </div>
              <label class="control-label col-sm-0" for="firstName">(maximum 30 characters)</label>
            </div>

            <!-- last name input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="lastName">Last Name:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Enter last name">
              </div>
              <label class="control-label col-sm-0" for="lastName">(maximum 30 characters)</label>
            </div>

            <!-- password input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="password">Password:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
              </div>
              <label class="control-label col-sm-0" for="password">(between 6 and 20 characters)</label>
            </div>

            <!-- confirm password input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="confirmPassword">Confirm Password:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm password">
              </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-2">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>

        <!-- insert a side navigator on the right only if logged in -->
        <?php include "layout/right_sidenav.php" ?>
      </div>
    </div>

    <!-- insert footer -->
    <?php include "layout/footer.php" ?>
  </body>
</html>
