<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About | BillSplitter</title>
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
          <h1>About BillSplitter</h1>
          <p>
            BillSplitter is a simple-to-use application which allows you to share bills with other people.
          </p>
          <hr>

          <h2>Features</h2>
          <div class="list-group">
            <div class="list-group-item">
              <img src="images/list.png" alt="Checklist Image" class="about-image"></img>
              <h4 class="list-group-item-heading">Track Bills</h4>
              <p class="list-group-item-text">
                With BillSplitter, you can easily keep track of what bills you need to pay, who owes you money and who you owe
                money to. Keep a history of all bills, or keep only the relevant ones.
              </p>
            </div>

            <div class="list-group-item">
              <img src="images/split.png" alt="Division Symbol Image" class="about-image"></img>
              <h4 class="list-group-item-heading">Custom Splitting</h4>
              <p class="list-group-item-text">
                Got a bill that you don't want to share with all housemates, such as a dinner split? Simply choose who you
                want to split your bills with.
              </p>
            </div>

            <div class="list-group-item">
              <img src="images/paypal.png" alt="PayPal Logo Image" class="about-image"></img>
              <h4 class="list-group-item-heading">Quick Payment</h4>
              <p class="list-group-item-text">
                Simply provide your PayPal.me personal link, and other users will be able to pay you their bill shares
                with just a few button clicks!
              </p>
            </div>

            <div class="list-group-item">
              <img src="images/email.png" alt="Email Image" class="about-image"></img>
              <h4 class="list-group-item-heading">Email Notifications</h4>
              <p class="list-group-item-text">
                BillSplitter will keep you updated on what's going on. Whenever someone adds a bill concerning you, or sends
                you money, you will be notified on your email address!
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
