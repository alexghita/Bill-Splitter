<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | BillSplitter</title>
    <!-- if the user is already logged in and tries to access this page, redirect to homepage -->
    <?php include "process_redirect_logged.php" ?>
    <!-- insert Bootstrap, custom CSS, jQuery -->
    <?php include "layout/head.php" ?>
    <!-- insert JavaScript form validation for this page's form -->
    <script src="js/validate_login.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>
    <!-- insert header -->
    <?php include "layout/jumbotron.php" ?>
    <?php include "layout/nav.php" ?>

    <!-- main content area -->
    <div class="container-fluid text-center" id="main">
      <div class="row content" id="mainRow">
        <div class="col-sm-10 text-left" id="mainArea">
          <h1>Login</h1>
          <p>
            Hello! Login to start splitting bills and getting your money back from your absent-minded housemates.
          </p>
          <hr>

          <!-- display form errors here from JavaScript validation -->
          <div class="row"><div id="errorBox"></div></div>

          <form class="form-horizontal" role="form" name="loginForm" action="process_login.php" method="post" onsubmit="return validateLogin()">
            <!-- email address input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Email:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-user"></i>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address">
              </div>
            </div>

            <!-- password input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="password">Password:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
              </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-2">
                <button type="submit" class="btn btn-primary">Login</button>
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
