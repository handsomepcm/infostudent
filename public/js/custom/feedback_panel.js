$(function(){
    var now = new Date();
    $('#feedback_start').scroller({
        preset: 'datetime',
        minDate: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
        timeFormat:'HH:ii',
        timeWheels:'HHii',
        theme: 'android',
        display: 'modal',
        animate: 'fade',
        mode: 'mixed'
    }); 
    $('#feedback_end').scroller({
        preset: 'datetime',
        minDate: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
        timeFormat:'HH:ii',
        timeWheels:'HHii',
        theme: 'android',
        display: 'modal',
        animate: 'fade',
        mode: 'mixed'
    });

    jQuery.validator.addMethod("notEqual", function(value, element, param) {
		return this.optional(element) || value != $(param).val();
	}, "This has to be different...");

    $(document).on("click", "#btnSaveFeedback", function() {
        var form = $( "#feedback_control" );
        form.validate({
	        rules: {
	        	feedback_start: {required: true},
	        	feedback_end: {required: true, notEqual: "#feedback_start" }
	        },
	        submitHandler: function(form) {
	            $.ajax({
	                url: APP_URL+"services/check_feedback",
	                type: 'POST',
	                data: new FormData(form),
	                processData: false,
	                contentType: false,
	                success: function(msg) {
	                    if (msg!=1) {
	                        alert("Not Saved "+msg);
	                    }
	                    else
	                    {           
	                        alert("Saved");
                            window.location.href = APP_URL+'services/feedback_activation';
	                    }
	                }
	            });
	        }
	    });
    });
	$(document).on("click", "#btnForceEndFeedback", function() {
		var answer = confirm("Confirm End of Filing")
		if (answer){
			$.ajax({
                url: APP_URL+"services/force_end_feedback",
                type: 'POST',
                success: function(msg) {
                    if (msg!=1) 
                    {
                        alert("Not Saved "+msg);
                    }
                    else
                    {
                        alert("Saved");
                        window.location.href = APP_URL+'services/feedback_activation';
                    }
                }
            });
		}
	});

});
