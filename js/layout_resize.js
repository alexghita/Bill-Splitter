/*
 * get the page title and set the base height according to the title;
 */

var mainRow = document.getElementById("mainRow");

if (pageTitle == "About | BillSplitter") {
  mainRow.style.height = "500px";
}
else if (pageTitle == "Account Settings | BillSplitter") {
  mainRow.style.height = "480px";
}
else if (pageTitle == "Add Bill | BillSplitter") {
  mainRow.style.height = "550px";
}
else if (pageTitle == "Contact | BillSplitter") {
  mainRow.style.height = "450px";
}
else if (pageTitle == "Login | BillSplitter") {
  mainRow.style.height = "300px";
}
if (pageTitle == "Home | BillSplitter") {
  mainRow.style.height = "400px";
}
else if (pageTitle == "My Bills | BillSplitter") {
  // get the value posted by PHP in an invisible input, then delete it
  var childDiv = document.getElementById("getBillCount");
  var parentDiv = childDiv.parentNode;
  var billCount = childDiv.value;

  mainRow.style.height = (400 + billCount * 27) + "px";
  parentDiv.removeChild(childDiv);
}
else if (pageTitle == "Register | BillSplitter") {
  mainRow.style.height = "520px";
}
else if (pageTitle == "View Bill | BillSplitter") {
  mainRow.style.height = "420px";
}
