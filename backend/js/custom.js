$(document).ready(function() {
     $(".alert-success").show().effect("bounce", 300);
    $(".alert-warning").show().effect("shake", 300);
    $(".alert-danger").show().effect("shake", 300);
    setTimeout(function() {
        $(".alert-danger,.alert-warning,.alert-success").slideUp();
    }, 5000);


/********************************Adding Datepicker in Jackpot create section**********************************************/

        
        
$('#jackpotdetails-start_date').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            minDate: 0,
            onSelect: function (date) {
                var dt2 = $('#jackpotdetails-end_date');
                var startDate = $(this).datetimepicker('getDate');
                var minDate = $(this).datetimepicker('getDate');
               // dt2.datetimepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 365);
                //sets dt2 maxDate to the last day of 365 days window
                dt2.datetimepicker('option', 'maxDate', startDate);
                dt2.datetimepicker('option', 'minDate', minDate);
                //$(this).datetimepicker('option', 'minDate', minDate);
            }
        });
       /**/ $('#jackpotdetails-end_date').datetimepicker({
          	dateFormat: "yy-mm-dd",
            	timeFormat: "HH:mm:ss",
        });

	$('#usersregister-date_of_birth').datepicker({
		changeMonth: true,
		changeYear: true,         
		dateFormat: "yy-mm-dd",
                yearRange: "1960:9999,9999",
		maxDate:0,
	  
        });
});
