function validateLogin() {
  // get all form input values
  var email = document.forms["loginForm"]["email"].value;
  var password = document.forms["loginForm"]["password"].value;
  var errorBox = document.getElementById("errorBox"); // div where form errors will be written
  var errorCount = 0;
  var mainRow = document.getElementById("mainRow");

  // reset the error box to prevent error stacking in case multiple wrong submissions are made
  errorBox.innerHTML = "";
  errorBox.className = "";
  mainRow.style.heigth = "300px";

  if (email == "" || email == null) {
    errorBox.innerHTML += "Please enter your email address.<br>";
    errorCount++;
  }

  if (password == "" || password == null) {
    errorBox.innerHTML += "Please enter your password.<br>";
    errorCount++;
  }

  if (errorCount > 0) {
    errorBox.className="container-fluid alert alert-danger col-sm-4 col-sm-offset-4 text-center";
    mainRow.style.height = (350 + errorCount * 14) + "px";
    return false;
  }
  return true;
}
