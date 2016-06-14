<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home | BillSplitter</title>
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
          <h1>Welcome</h1>
          <p>
            If you are living in a shared house, then surely you've been through the pains of splitting bills. Housemates
            not paying, never getting your money back, forgetting to pay the internet bill... Fortunately, there is a better
            way now! With BillSplitter, you and your housemates can easily keep track of bills and send each other money.
          </p>
          <hr>

          <h3>Using BillSplitter</h3>
          <div class="list-group">
            <div class="list-group-item">
              <h4 class="list-group-item-heading">Add Bills</h4>
              <p class="list-group-item-text">
                Choose a name and a description for your bill, add the cost, the due date and who's paying for it. That's
                all you need to do to notify your housemates of a new bill!
              </p>
            </div>

            <div class="list-group-item">
              <h4 class="list-group-item-heading">Manage Bills</h4>
              <p class="list-group-item-text">
                Bills that concern you are automatically added to the bill list. From there, you can check their details,
                pay for them and remove bills that are no longer relevant.
              </p>
            </div>

            <div class="list-group-item">
              <h4 class="list-group-item-heading">Paying for bill</h4>
              <p class="list-group-item-text">
                If the person paying for a bill has set up their PayPal personal link, you are one click away from paying
                for that bill! It's as simple as that.
              </p>
            </div>
          </div>
        </div>

        <!-- insert a side navigator on the right only if logged in -->
        <?php include "layout/right_sidenav.php" ?>
      </div>
    </div>

    <!-- insert footer -->
    <?php include "layout/footer.php" ?>
  </body>
</html>
