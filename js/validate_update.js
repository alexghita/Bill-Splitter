function validateUpdate() {
  // get all form input values
  var firstName = document.forms["updateForm"]["firstName"].value;
  var lastName = document.forms["updateForm"]["lastName"].value;
  var password = document.forms["updateForm"]["password"].value;
  var confirmPassword = document.forms["updateForm"]["confirmPassword"].value;
  var payPal = document.forms["updateForm"]["payPal"].value;
  var errorBox = document.getElementById("errorBox"); // div where form errors will be written
  var errorCount = 0;
  var mainRow = document.getElementById("mainRow");

  // reset the error box to prevent error stacking in case multiple wrong submissions are made
  errorBox.innerHTML = "";
  errorBox.className = "";
  mainRow.style.heigth = "480px";

  if (firstName.length > 30) {
    errorBox.innerHTML += "First Name is too long.<br>";
    errorCount++;
  }

  if (lastName.length > 30) {
    errorBox.innerHTML += "Last Name is too long.<br>";
    errorCount++;
  }

  if (password.length > 0 && password.length < 6) {
    errorBox.innerHTML += "Password is too short.<br>";
    errorCount++;
  }
  else if (password.length > 20) {
    errorBox.innerHTML += "Password is too long.<br>";
    errorCount++;
  }

  if (password != confirmPassword) {
    errorBox.innerHTML += "Passwords do not match.<br>";
    errorCount++;
  }
  if (payPal != "" && payPal != null && payPal.indexOf(" ") > 0) {
    errorBox.innerHTML += "PayPal link cannot contain spaces.<br>";
    errorCount++;
  }

  if (errorCount > 0) {
    errorBox.className = "container-fluid alert alert-danger col-sm-4 col-sm-offset-4 text-center";
    mainRow.style.height = (520 + errorCount * 14) + "px";
    return false;
  }
  return true;
}
