var dueDate = document.getElementById("dueDate");
var today = new Date().toISOString().split("T")[0];

dueDate.setAttribute("min", today);
