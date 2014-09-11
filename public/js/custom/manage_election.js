    $(document).ready(function() {
        var oTable = $('#election').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 5,
            "sAjaxSource": APP_URL+"comelec/get_all_election_data", 
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ]       
        });
        $('#election').dataTable().makeEditable({
            "aoColumns": [
                {
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true
                            }
                        }
                    },
                    indicator: 'Saving New Election Name...',
                    tooltip: 'Edit Election Name',
                    type: 'text',
                    sUpdateURL: APP_URL+'comelec/edit_election_name/',
                    callback : function(value, settings) {                        
                        if (value==0) {
                            alert("Not Saved."); 
                            oTable.fnReloadAjax();   
                        }
                        else
                        {
                            alert("Success!"); 
                        }
                    }
                },
                null
            ],                      
        });
        var form = $( "#add_election" );
        form.validate({
            submitHandler: function(form) {
                $.ajax({
                    url: APP_URL+"comelec/check_add_election",
                    type: 'POST',
                    data: $( "#add_election" ).serialize(),
                    success: function(msg) {
                        if (msg!=1) {;
                            alert("Not Saved "+msg);
                        }
                        else
                        {
                            $("#add_election")[0].reset();
                            alert("Saved");
                        }
                    }
                });
            }
        });
    });
