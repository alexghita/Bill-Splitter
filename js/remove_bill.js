$(document).ready(function() {
	$("body").on("click", ".removeBill", function() {
		// get the bill ID from the table row
    var billId = $(this).parent().parent().attr('id');

    // post the data to the server using AJAX
    $.post("process_remove_bill.php", {"id": billId}, function(data) {
      console.log("Received Data: " + data);
    });

    // remove the row from the table
    $(this).parent().parent().remove();
	});
});
