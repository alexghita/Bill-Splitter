<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View Bill | BillSplitter</title>
    <!-- if the user is not logged in and tries to access this page, redirect to homepage -->
    <?php include "process_redirect_unlogged.php" ?>
    <!-- insert Bootstrap, custom CSS, jQuery -->
    <?php include "layout/head.php" ?>
  </head>

  <body>
    <!-- insert header -->
    <?php include "layout/jumbotron.php" ?>
    <?php include "layout/nav.php" ?>

    <!-- main content area -->
    <div class="container-fluid text-center" id="main">
      <div class="row content" id="mainRow">
        <div class="col-sm-10 text-left" id="mainArea">
          <h1>View Bill</h1>
          <p>
            Here you can view your bill's details, as well as pay for it if you are not the payer.
          </p>
          <hr>

          <?php include "process_view_bill.php" ?>
        </div>

        <!-- insert a side navigator on the right only if logged in -->
        <?php include "layout/right_sidenav.php" ?>
      </div>
    </div>

    <!-- insert footer -->
    <?php include "layout/footer.php" ?>
  </body>
</html>
