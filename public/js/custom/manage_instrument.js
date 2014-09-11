    $(document).ready(function() {
        var oTable = $('#instrument').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"services/get_all_instrument_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ] 
        });

        var oTable1 = $('#instrument_lecturer').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"services/get_instrument_lecturer_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ] 
        });

        var oTable2 = $('#instrument_classroom').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"services/get_instrument_classroom_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ] 
        });

        var oTable3 = $('#instrument_course').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"services/get_instrument_course_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ] 
        });

        var oTable4 = $('#instrument_others').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"services/get_instrument_others_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ] 
        });

        $("#instrument").on("click", "#delete", function() {
            var uid=$(this).attr('name');
            var answer = confirm("Are you sure you want to delete instrument?")
            if (answer){
                $.ajax({
                    url: APP_URL+"services/remove_instrument",
                    type: "POST",
                    data: {id:uid,csrf_test_name: CSRF_HASH},
                    success: function(msg){
                        oTable.fnReloadAjax();
                        alert("Removal Success");
                    }
                });
            }
        });

        $("#instrument_others").on("click", "#delete", function() {
            var uid=$(this).attr('name');
            var answer = confirm("Are you sure you want to delete instrument?")
            if (answer){
                $.ajax({
                    url: APP_URL+"services/remove_instrument",
                    type: "POST",
                    data: {id:uid,csrf_test_name: CSRF_HASH},
                    success: function(msg){
                        oTable4.fnReloadAjax();
                        alert("Removal Success");
                    }
                });
            }
        });

        $("#instrument_lecturer").on("click", "#delete", function() {
            var uid=$(this).attr('name');
            var answer = confirm("Are you sure you want to delete instrument?")
            if (answer){
                $.ajax({
                    url: APP_URL+"services/remove_instrument",
                    type: "POST",
                    data: {id:uid,csrf_test_name: CSRF_HASH},
                    success: function(msg){
                        oTable1.fnReloadAjax();
                        alert("Removal Success");
                    }
                });
            }
        });

        $("#instrument_classroom").on("click", "#delete", function() {
            var uid=$(this).attr('name');
            var answer = confirm("Are you sure you want to delete instrument?")
            if (answer){
                $.ajax({
                    url: APP_URL+"services/remove_instrument",
                    type: "POST",
                    data: {id:uid,csrf_test_name: CSRF_HASH},
                    success: function(msg){
                        oTable2.fnReloadAjax();
                        alert("Removal Success");
                    }
                });
            }
        });

        $("#instrument_course").on("click", "#delete", function() {
            var uid=$(this).attr('name');
            var answer = confirm("Are you sure you want to delete instrument?")
            if (answer){
                $.ajax({
                    url: APP_URL+"services/remove_instrument",
                    type: "POST",
                    data: {id:uid,csrf_test_name: CSRF_HASH},
                    success: function(msg){
                        oTable3.fnReloadAjax();
                        alert("Removal Success");
                    }
                });
            }
        });
    });