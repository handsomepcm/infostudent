$(document).ready(function(){
	$( "#change_email" ).validate({
		rules: {
			confirm_email_address: {
				equalTo: "#new_email_address"
			},
		},
		submitHandler: function(form) {
            $.ajax({
				url: APP_URL+"users/check_email_address",
				type: 'POST',
				data: $( "#change_email" ).serialize(),
				success: function(msg) {
					if (msg!=1) {;
						alert("Not Saved "+msg);
					}
					else
					{
						$("#change_email")[0].reset();
						alert("Email Saved. Email will be updated on next login.");
					}
				}
			});
        }
	});

	$( "#change_password" ).validate({
		rules: {
			new_password: {
				minlength: 7,
				maxlength: 20
			},
			confirm_new_password: {
				equalTo: "#new_password"
			},
		},
		submitHandler: function(form) {
            $.ajax({
				url: APP_URL+"users/check_password",
				type: 'POST',
				data: $( "#change_password" ).serialize(),
				success: function(msg) {
					if (msg!=1) {;
						alert("Not Saved "+msg);
					}
					else
					{
						$("#change_password")[0].reset();
						alert("Saved");
					}
				}
			});
        }
	});

});