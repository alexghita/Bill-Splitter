<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Thank you! | BillSplitter</title>
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
          <h1>Thank you for your feedback!</h1>
          <p>
            You should receive a response in a few days.
          </p>
          <hr>
        </div>

        <!-- insert a side navigator on the right only if logged in -->
        <?php include "layout/right_sidenav.php" ?>
      </div>
    </div>

    <!-- insert footer -->
    <?php include "layout/footer.php" ?>
  </body>
</html>
