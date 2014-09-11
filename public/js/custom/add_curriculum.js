$(document).ready(function(){
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	    return this.optional(element) || /^[a-z\s]+$/i.test(value);
	}, "Only alphabetical characters"); 

	var form = $( "#add_curriculum" );
	form.validate({
		rules: {
			description: "required"
		},
		submitHandler: function(form) {
            $.ajax({
				url: APP_URL+"acadhead/check_add_curriculum",
				type: 'POST',
				data: $( "#add_curriculum" ).serialize(),
				success: function(msg) {
					if (msg!=1) {;
						alert("Not Saved "+msg);
					}
					else
					{
						$("#add_curriculum")[0].reset();
						alert("Saved");
					}
				}
			});
        }
	});
});