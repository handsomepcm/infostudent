    $(document).ready(function() {
        var oTable = $('#candidates').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"comelec/get_all_candidates_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ] 
        });
        $("#candidates").on("click", "#approve", function() {
            var uid=$(this).attr('name');
            $.ajax({
                url: APP_URL+"comelec/approve",
                type: "POST",
                data: {id:uid,csrf_test_name: CSRF_HASH},
                success: function(msg){
                    alert("Candidacy Approved.");
                }
            });
        });
        $("#candidates").on("click", "#disapprove", function() {
            var uid=$(this).attr('name');
            $.ajax({
                url: APP_URL+"comelec/disapprove",
                type: "POST",
                data: {id:uid,csrf_test_name: CSRF_HASH},
                success: function(msg){
                    alert("Candidacy Dispproved.");
                }
            });
        });
    });
