    $(document).ready(function() {
        var oTable = $('#users').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[0,'desc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"admin/get_all_logs_data"      
        });


    });
    function clear_export()
    {
        var answer = confirm("Exporting the data will delete the logs from the database and a download will be started.")
        if (answer){
            document.messages.submit();
        }
        return false;  
    }