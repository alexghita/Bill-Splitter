function validateAddBill() {
  // get all form input values
  var billName = document.forms["addBillForm"]["billName"].value;
  var amount = document.forms["addBillForm"]["amount"].value;
  var dueDate = document.forms["addBillForm"]["dueDate"].value;
  var billDescription = document.forms["addBillForm"]["billDescription"].value;
  var errorBox = document.getElementById("errorBox"); // div where form errors will be written
  var errorCount = 0;
  var mainRow = document.getElementById("mainRow");

  // reset the error box to prevent error stacking in case multiple wrong submissions are made
  errorBox.innerHTML = "";
  errorBox.className = "";
  mainRow.style.heigth = "450px";

  if (billName == "" || billName == null) {
    errorBox.innerHTML += "Bill Name cannot be left blank.<br>";
    errorCount++;
  }
  else if (billName.length > 30) {
    errorBox.innerHTML += "Bill Name is too long.<br>";
    errorCount++;
  }

  if (amount == "" || amount == null) {
    errorBox.innerHTML += "Bill Amount cannot be left blank.<br>";
    errorCount++;
  }

  if (dueDate == "" || dueDate == null) {
    errorBox.innerHTML += "Due Date cannot be left blank.<br>";
    errorCount++;
  }

  if (billDescription == "" || billDescription == null) {
    errorBox.innerHTML += "Bill Description cannot be left blank.<br>";
    errorCount++;
  }

  if (errorCount > 0) {
    errorBox.className="container-fluid alert alert-danger col-sm-4 col-sm-offset-4 text-center";
    mainRow.style.height = (620 + errorCount * 14) + "px";
    return false;
  }
  return true;
}
