$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	    return this.optional(element) || /^[a-z\s]+$/i.test(value);
	}, "Only alphabetical characters"); 

	var form = $( "#add_user" );
	form.validate({
		rules: {
		// simple rule, converted to {required:true}
		user_id: "number",
		first_name: "lettersonly",
		last_name: "lettersonly",
		// compound rule
		email_address: {
			required: true,
			email: true
			},
		privilege: "required"
		},
		submitHandler: function(form) {
            $.ajax({
				url: APP_URL+"admin/check_add_user",
				type: 'POST',
				data: $( "#add_user" ).serialize(),
				success: function(msg) {
					if (msg!=1) {;
						alert("Not Saved "+msg);
					}
					else
					{
						$("#add_user")[0].reset();
						alert("Saved");
					}
				}
			});
        }
	});
	$(document).on('click', '#btnAddUser', function(){
		
	});

});