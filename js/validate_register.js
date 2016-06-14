function validateRegister() {
  // get all form input values
  var firstName = document.forms["registerForm"]["firstName"].value;
  var lastName = document.forms["registerForm"]["lastName"].value;
  var email = document.forms["registerForm"]["email"].value;
  var confirmEmail = document.forms["registerForm"]["confirmEmail"].value;
  var password = document.forms["registerForm"]["password"].value;
  var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
  var errorBox = document.getElementById("errorBox"); // div where form errors will be written
  var errorCount = 0;
  var mainRow = document.getElementById("mainRow");

  // reset the error box to prevent error stacking in case multiple wrong submissions are made
  errorBox.innerHTML = "";
  errorBox.className = "";
  mainRow.style.heigth = "520px";

  if (firstName == "" || firstName == null) {
    errorBox.innerHTML += "First Name cannot be left blank.<br>";
    errorCount++;
  }
  else if (firstName.length > 30) {
    errorBox.innerHTML += "First Name is too long.<br>";
    errorCount++;
  }

  if (lastName == "" || lastName == null) {
    errorBox.innerHTML += "Last Name cannot be left blank.<br>";
    errorCount++;
  }
  else if (lastName.length > 30) {
    errorBox.innerHTML += "Last Name is too long.<br>";
    errorCount++;
  }

  if (email == "" || email == null) {
    errorBox.innerHTML += "Email cannot be left blank.<br>";
    errorCount++;
  }
  else if (email.length > 50) {
    errorBox.innerHTML += "Email is too long.<br>";
    errorCount++;
  }

  if (confirmEmail == "" || confirmEmail == null) {
    errorBox.innerHTML += "Please confirm email.<br>";
    errorCount++;
  }
  else if (email != confirmEmail) {
    errorBox.innerHTML += "Email addresses do not match.<br>";
    errorCount++;
  }

  if (password == "" || password == null) {
    errorBox.innerHTML += "Password cannot be left blank.<br>";
    errorCount++;
  }
  else if (password.length < 6) {
    errorBox.innerHTML += "Password is too short.<br>";
    errorCount++;
  }
  else if (password.length > 20) {
    errorBox.innerHTML += "Password is too long.<br>";
    errorCount++;
  }

  if (confirmPassword == "" || confirmPassword == null) {
    errorBox.innerHTML += "Please confirm password.<br>";
    errorCount++;
  }
  else if (password != confirmPassword) {
    errorBox.innerHTML += "Passwords do not match.<br>";
    errorCount++;
  }

  if (errorCount > 0) {
    errorBox.className="container-fluid alert alert-danger col-sm-4 col-sm-offset-4 text-center";
    mainRow.style.height = (585 + errorCount * 14) + "px";
    return false;
  }
  return true;
}
