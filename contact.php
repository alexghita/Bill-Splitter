<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact | BillSplitter</title>
    <!-- insert Bootstrap, custom CSS, jQuery -->
    <?php include "layout/head.php" ?>
    <!-- insert JavaScript form validation for this page's form -->
    <script src="js/validate_contact.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>
    <!-- insert header -->
    <?php include "layout/jumbotron.php" ?>
    <?php include "layout/nav.php" ?>

    <!-- main content area -->
    <div class="container-fluid text-center" id="main">
      <div class="row content" id="mainRow">
        <div class="col-sm-10 text-left" id="mainArea">
          <h1>Contact</h1>
          <p>
            If you would like to contact me regarding BillSplitter, please provide your name and email address along with your
            message. I will do my best to respond within five working days.
          </p>
          <hr>

          <!-- display form errors here from JavaScript validation -->
          <div class="row"><div id="errorBox"></div></div>

          <form class="form-horizontal" role="form" name="contactForm" action="process_contact.php" method="post" onsubmit="return validateContact()">
            <!-- name input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
              </div>
            </div>

            <!-- email address input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Email:</label>
              <div class="col-sm-6 left-inner-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address">
              </div>
            </div>

            <!-- message input -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="message">Message:</label>
              <div class="col-sm-6">
                <textarea name="message" class="form-control" rows="5" id="message" placeholder="Enter message"></textarea>
              </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-2">
                <button type="submit" class="btn btn-primary">Send</button>
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
