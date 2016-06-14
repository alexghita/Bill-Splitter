function validateContact() {
  // get all form input values
  var name = document.forms["contactForm"]["name"].value;
  var email = document.forms["contactForm"]["email"].value;
  var message = document.forms["contactForm"]["message"].value;
  var errorBox = document.getElementById("errorBox"); // div where form errors will be written
  var errorCount = 0;
  var mainRow = document.getElementById("mainRow");

  // reset the error box to prevent error stacking in case multiple wrong submissions are made
  errorBox.innerHTML = "";
  errorBox.className = "";
  mainRow.style.heigth = "450px";

  if (name == "" || name == null) {
    errorBox.innerHTML += "Please enter your name.<br>";
    errorCount++;
  }

  if (email == "" || email == null) {
    errorBox.innerHTML += "Please enter your email address.<br>";
    errorCount++;
  }

  if (message == "" || message == null) {
    errorBox.innerHTML += "Please enter your message.<br>";
    errorCount++;
  }

  if (errorCount > 0) {
    errorBox.className="container-fluid alert alert-danger col-sm-4 col-sm-offset-4 text-center";
    mainRow.style.height = (520 + errorCount * 14) + "px";
    return false;
  }
  return true;
}
