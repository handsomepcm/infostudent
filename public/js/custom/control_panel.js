$(function(){
    var now = new Date();
    $('#filing_start').scroller({
        preset: 'datetime',
        minDate: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
        timeFormat:'HH:ii',
        timeWheels:'HHii',
        theme: 'android',
        display: 'modal',
        animate: 'fade',
        mode: 'mixed'
    }); 
    $('#filing_end').scroller({
        preset: 'datetime',
        minDate: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
        timeFormat:'HH:ii',
        timeWheels:'HHii',
        theme: 'android',
        display: 'modal',
        animate: 'fade',
        mode: 'mixed'
    });

    $('#voting_start').scroller({
        preset: 'datetime',
        minDate: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
        timeFormat:'HH:ii',
        timeWheels:'HHii',
        theme: 'android',
        display: 'modal',
        animate: 'fade',
        mode: 'mixed'
    }); 
    $('#voting_end').scroller({
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

    $(document).on("click", "#btnSaveFiling", function() {
        var form = $( "#filing_control" );
        form.validate({
	        rules: {
	        	filing_start: {required: true},
	        	filing_end: {required: true, notEqual: "#filing_start" }
	        },
	        submitHandler: function(form) {
	            $.ajax({
	                url: APP_URL+"comelec/check_filing",
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
							//	                 
	                        alert("Saved");
	                    }
	                }
	            });
	        }
	    });
    });
	$(document).on("click", "#btnForceEndFiling", function() {
		var answer = confirm("Confirm End of Filing")
		if (answer){
			$.ajax({
                url: APP_URL+"comelec/force_end_filing",
                type: 'POST',
                success: function(msg) {
                    if (msg!=1) {
                        alert("Not Saved "+msg);
                    }
                    else
                    {
                        alert("Saved");
                    }
                }
            });
		}
		return false;  
	});

	$(document).on("click", "#btnSaveVoting", function() {
        var form = $( "#voting_control" );
        form.validate({
	        rules: {
	        	voting_start: {required: true},
	        	voting_end: {required: true, notEqual: "#filing_start" }
	        },
	        submitHandler: function(form) {
	            $.ajax({
	                url: APP_URL+"comelec/check_voting",
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
							//	                 
	                        alert("Saved");
	                    }
	                }
	            });
	        }
	    });
    });
	$(document).on("click", "#btnForceEndVoting", function() {
		var answer = confirm("Confirm End of Voting")
		if (answer){
			$.ajax({
                url: APP_URL+"comelec/force_end_voting",
                type: 'POST',
                success: function(msg) {
                    if (msg!=1) {
                        alert("Not Saved "+msg);
                    }
                    else
                    {
                        alert("Saved");
                    }
                }
            });
		}
		return false;  
	});
});
