	$(window).load(function(){
		var counts=0;
		$('#submit').hide();
		$(":radio").change(function() {
		    var names = {};
		    $(':radio').each(function() {
		        names[$(this).attr('name')] = true;
		    });
		    var count = 0;
		    $.each(names, function() { 
		        count++;
		    });
			counts=count;
		    if ($(':radio:checked').length === count) {
		        alert("All Categories Rated");
		        $('#submit').show();
		    }
		}).change();
		$("input[type=radio]").click(function() {
			var total = 0;
			$("input[type=radio]:checked").each(function() {
				total += parseFloat($(this).val());
			});
			avg=total/counts;
			avg=avg.toFixed(2);
			$("input[name=totalsum]").val(avg)
		});
	});