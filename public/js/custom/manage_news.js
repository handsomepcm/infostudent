    $(document).ready(function() {
        var oTable = $('#news').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[3,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"acadhead/get_all_news_data",
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]},
            ]       
        });
    });
