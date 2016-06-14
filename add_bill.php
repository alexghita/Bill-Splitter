<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Bill | BillSplitter</title>
    <!-- if the user is not logged in and tries to access this page, redirect to homepage -->
    <?php include "process_redirect_unlogged.php" ?>
    <!-- insert Bootstrap, custom CSS, jQuery -->
    <?php include "layout/head.php" ?>
    <!-- insert JavaScript form validation for this page's form -->
    <script src="js/validate_add_bill.js" type="text/javascript" charset="utf-8"></script>
    <!-- insert enhanced dropdown selection lists -->
    <script src="js/dropdown_enhancement.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="style/dropdown_enhancement.css">
  </head>

  <body>
    <!-- insert header -->
    <?php include "layout/jumbotron.php" ?>
    <?php include "layout/nav.php" ?>

    <!-- main content area -->
    <div class="container-fluid text-center" id="main">
      <div class="row content" id="mainRow">
        <div class="col-sm-10 text-left" id="mainArea">
          <h1>Add Bill</h1>
          <p>
            Here you can add a new bill. Simply choose a name, the amount to be paid, the due date and the payers. BillSplitter
            will take care of the rest.
          </p>
          <p>
            Note that it is your responsibility to pay the bill. The other payers simply need to send you the money through PayPal.
            Don't disappoint them!
          </p>
          <p>
             Be careful! Once you create a bill, you can no longer modify it.
          </p>
          <hr>

          <!-- display form errors here from JavaScript validation -->
          <div class="row"><div id="errorBox"></div></div>

          <form class="form-horizontal" role="form" name="addBillForm" action="process_add_bill.php" method="post" onsubmit="return validateAddBill()">
            <!-- bill name input -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="billName">Bill Name:</label>
              <div class="col-sm-7 left-inner-addon">
                <i class="glyphicon glyphicon-list-alt"></i>
                <input type="text" name="billName" class="form-control" id="billName" placeholder="Enter bill name">
              </div>
              <label class="control-label col-sm-0" for="billName">(maximum 30 characters)</label>
            </div>

            <div class="form-group">
              <!-- amount input -->
              <label class="control-label col-sm-2" for="amount">Amount:</label>
              <div class="col-sm-2 left-inner-addon">
                <i class="glyphicon glyphicon-gbp"></i>
                <input type="number" name="amount" class="form-control" id="amount" min="0" max="1000" step="0.01" placeholder="20.00">
              </div>

              <!-- due date input -->
              <label class="control-label col-sm-2" for="dueDate">Due Date:</label>
              <div class="col-sm-3 left-inner-addon">
                <i class="glyphicon glyphicon-calendar"></i>
                <input type="date" name="dueDate" class="form-control" id="dueDate" min="getToday">
              </div>
            </div>

            <!-- bill description input -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="billDescription">Bill Description:</label>
              <div class="col-sm-7">
                <textarea name="billDescription" class="form-control" rows="3" id="billDescription" placeholder="Enter description"></textarea>
              </div>
            </div>

            <!-- select payers input -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="payers">Select payers:<br>(other than you)</label>
              <div class="btn-group col-sm-7">
                <button class="btn btn-primary" data-label-placement disabled>Payers</button>
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <?php include "layout/add_bill_dropdown.php" ?>
                  </ul>
              </div>
            </div>

            <!-- submit button -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-2">
                <button type="submit" class="btn btn-primary">Create Bill</button>
              </div>
            </div>
          </form>
        </div>

        <!-- insert a side navigator on the right only if logged in -->
        <?php include "layout/right_sidenav.php" ?>
      </div>
    </div>

    <!-- modify date input to accept only future dates -->
    <script src="js/add_bill.js" type="text/javascript" charset="utf-8"></script>
    <!-- insert footer -->
    <?php include "layout/footer.php" ?>
  </body>
</html>
