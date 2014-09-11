$(document).ready(function(){
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg != value;
	}, "Value must not equal arg.");


	var form = $( "#add_course" );
	
	form.validate({
		rules: {
		    course_unit_lec: {
		    	required: function(element) {
					return $("#course_unit_lab").val() == '';
				}
		    }

		},
		messages: {
			course_unit_lec: { required: "Please select either Lecture or Laboratory." }
		},  
		submitHandler: function(form) {
            $.ajax({
				url: APP_URL+"acadhead/check_add_course",
				type: 'POST',
				data: $( "#add_course" ).serialize(),
				success: function(msg) {
					if (msg!=1) {;
						alert("Not Saved "+msg);
					}
					else
					{
						$("#add_course")[0].reset();
						alert("Saved");
					}
				}
			});
        }
	});
});