    $(document).ready(function() {
        var oTable = $('#curriculum').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            "aaSorting": [[1,'desc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 5,
            "sAjaxSource": APP_URL+"acadhead/get_all_curriculum_data", 
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ]}
            ]      
        });
        $('#curriculum').dataTable().makeEditable({
            "aoColumns": [
                {
                    indicator: 'Saving Curriculum Name...',
                    tooltip: 'Edit Curriculum Name',
                    type: 'text',
                    sUpdateURL: APP_URL+'acadhead/edit_curriculum_name/',
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
                    indicator: 'Saving Description...',
                    tooltip: 'Edit Description',
                    type: 'text',
                    sUpdateURL: APP_URL+'acadhead/edit_curriculum_description/',
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
                                number:true
                            }
                        }
                    },
                    indicator: 'Saving Years...',
                    tooltip: 'Edit Years',
                    type: 'text',
                    sUpdateURL: APP_URL+'acadhead/edit_curriculum_years/',
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
                    indicator: 'Saving School Year...',
                    tooltip: 'Edit School Year',
                    data   : " {'2013-2014':'2013-2014','2014-2015':'2014-2015','2015-2016':'2015-2016'}",
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'acadhead/edit_curriculum_sy/',
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
                }
            ]                      
        });

        $("#curriculum").on("click", "#subject_list", function() {
            var uid=$(this).attr('name');
            $.ajax({
                type: "POST",
                data: {id:uid,csrf_test_name: CSRF_HASH},
                success: function(msg){
                    window.location.href = APP_URL+'acadhead/manage_course_curriculum/'+uid;
                }
            });
        });

         $("#curriculum").on("click", "#upload_list", function() {
            var uid=$(this).attr('name');
            $.ajax({
                type: "POST",
                data: {id:uid,csrf_test_name: CSRF_HASH},
                success: function(msg){
                    window.location.href = APP_URL+'acadhead/csv_curriculum/'+uid+'/1';
                }
            });
        });

        var form1 = $( "#add_course" );
        var value1 = $("#id_add").val();
        form1.validate({
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
                            alert("Saved");
                            window.location.href = APP_URL+'acadhead/manage_course_curriculum/'+value1;
                        }
                    }
                });
            }
        });

        var form2 = $( "#delete_course" );
        var value2 = $("#id_delete").val();
        form2.validate({
            submitHandler: function(form) {
                $.ajax({
                    url: APP_URL+"acadhead/check_delete_course",
                    type: 'POST',
                    data: $( "#delete_course" ).serialize(),
                    success: function(msg) {
                        if (msg!=1) {;
                            alert("Not Saved "+msg);
                        }
                        else
                        {
                            alert("Saved");
                            window.location.href = APP_URL+'acadhead/manage_course_curriculum/'+value2;
                        }
                    }
                });
            }
        });
    });
