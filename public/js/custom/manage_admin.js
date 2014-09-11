    $(document).ready(function() {
        var oTable = $('#users').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'asc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "pagingType": "full_numbers",
            "iDisplayLength": 10,
            "sAjaxSource": APP_URL+"admin/get_all_users_data", 
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]},
                { "bSearchable": false, "bSortable": false, "aTargets": [ 7 ]}
            ]       
        });
        $('#users').dataTable().makeEditable({
            "aoColumns": [
                {
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true,
                                number: true
                            },
                            messages: 
                            { 
                                value: 
                                {
                                    number: "Enter a valid User ID" 
                                } 
                            }
                        }
                    },
                    indicator: 'Saving New User ID...',
                    tooltip: 'Edit User ID',
                    type: 'text',
                    sUpdateURL: APP_URL+'admin/edit_user_id/',
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
                {
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true,
                            }
                        }
                    },
                    indicator: 'Saving New Last Name...',
                    tooltip: 'Edit Last Name',
                    type: 'text',
                    sUpdateURL: APP_URL+'admin/edit_last_name/',
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
                {
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true,
                            }
                        }
                    },
                    indicator: 'Saving New First Name...',
                    tooltip: 'Edit First Name',
                    type: 'text',
                    sUpdateURL: APP_URL+'admin/edit_first_name/',
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
                },null,
                /*{
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true,
                            }
                        }
                    },
                    indicator: 'Saving New Privilege...',
                    tooltip: 'Edit Privilege',
                    data   : " {'administrator':'administrator','acadhead':'acadhead','comelec':'comelec', 'registrar':'registrar', 'student':'student', 'services':'services', 'schooladmin':'schooladmin'}",
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'admin/edit_privilege/',
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
                },*/
                {
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true,
                                email: true
                            },
                            messages: 
                            { 
                                value: 
                                {
                                    email: "Enter a valid Email Address" 
                                } 
                            }

                        }
                    },
                    indicator: 'Saving New Email...',
                    tooltip: 'Edit Email',
                    type: 'text',
                    sUpdateURL: APP_URL+'admin/edit_email/',
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
                {
                    oValidationOptions : 
                    { 
                        rules:{ 
                            value: 
                            {
                                required: true,
                            }
                        }
                    },
                    indicator: 'Saving Activation...',
                    tooltip: 'Edit Activation',
                    data   : " {'activated':'activated','deactivated':'deactivated'}",
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'admin/edit_activation/',
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

        $("#users").on("click", "#reset_password", function() {
            var uid=$(this).attr('name');
            var answer = confirm("Are you sure you want to reset password? The new password is 'default'.")
            if (answer){
                $.ajax({
                    url: APP_URL+"admin/reset_password",
                    type: "POST",
                    data: {id:uid,csrf_test_name: CSRF_HASH},
                    success: function(msg){
                        alert("Reset Password Success.");
                    }
                });
            }
        });
    });
