<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Bills | BillSplitter</title>
    <!-- if the user is not logged in and tries to access this page, redirect to homepage -->
    <?php include "process_redirect_unlogged.php" ?>
    <!-- insert Bootstrap, custom CSS, jQuery -->
    <?php include "layout/head.php" ?>
    <!-- insert AJAX for removing bills -->
    <script src="js/remove_bill.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>
    <!-- insert header -->
    <?php include "layout/jumbotron.php" ?>
    <?php include "layout/nav.php" ?>

    <!-- main content area -->
    <div class="container-fluid text-center" id="main">
      <div class="row content" id="mainRow">
        <div class="col-sm-10 text-left" id="mainArea">
          <h1>My Bills</h1>
          <p>
            Here you can see a list of all your bills, as well their current status.
          </p>
          <p>
            Remember: if you're the payer, it's your responsibility to pay the bill, so it would be a good idea
            not to remove the bill before actually paying it!
          </p>
          <hr>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Bill Name</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php include "process_my_bills.php" ?>
            </tbody>
          </table>
        </div>

        <!-- insert a side navigator on the right only if logged in -->
        <?php include "layout/right_sidenav.php" ?>
      </div>
    </div>

    <!-- insert footer -->
    <?php include "layout/footer.php" ?>
  </body>
</html>
