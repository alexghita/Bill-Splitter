/*
 * get the page title and highlight the corresponding button in the navigator;
 */

pageTitle = document.title;

if (pageTitle == "Home | BillSplitter") {
  document.getElementById("navHome").className = "active";
}
else if (pageTitle == "Register | BillSplitter") {
  document.getElementById("navRegister").className = "active";
}
else if (pageTitle == "My Bills | BillSplitter") {
  document.getElementById("navMyBills").className = "active";
}
else if (pageTitle == "About | BillSplitter") {
  document.getElementById("navAbout").className = "active";
}
else if (pageTitle == "Contact | BillSplitter") {
  document.getElementById("navContact").className = "active";
}
else if (pageTitle == "Login | BillSplitter") {
  document.getElementById("navLogin").className = "active";
}
else if (pageTitle == "Add Bill | BillSplitter") {
  document.getElementById("navAddBill").className = "active";
}
else if (pageTitle == "Account Settings | BillSplitter") {
  document.getElementById("navAccountSettings").className = "active";
}
