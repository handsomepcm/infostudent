    $(document).ready(function() {
        var oTable = $('#enrollment').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"registrar/get_all_enrollment_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 7 ]}
            ]
        });

        $('#student').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "sAjaxSource": APP_URL+"registrar/get_all_student_data"
        });

        $('#grades').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "sAjaxSource": APP_URL+"registrar/get_all_grade_data"
        });
    });