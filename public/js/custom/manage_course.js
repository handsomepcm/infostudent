    $(document).ready(function() {
        var oTable = $('#course').dataTable({
            "bProcessing": true,
            //"bServerSide": true,
            "bLengthChange": false,
            //"aaSorting": [[1,'desc']],
            //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            //"sPaginationType": "bootstrap",
            "sServerMethod": "POST",
            "iDisplayLength": 10,
            "pagingType": "full_numbers",
            "sAjaxSource": APP_URL+"acadhead/get_all_course_data"   
        });
        $('#course').dataTable().makeEditable({
            "aoColumns": [
                null,
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
                    indicator: 'Saving Course Name...',
                    tooltip: 'Edit Course Name',
                    type: 'text',
                    sUpdateURL: APP_URL+'acadhead/edit_course_name/',
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
                    indicator: 'Saving...',
                    tooltip: 'Edit',
                    data   : subjects,
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'acadhead/edit_course_prereq/',
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
                    indicator: 'Saving...',
                    tooltip: 'Edit',
                    data   : subjects,
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'acadhead/edit_course_coreq/',
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
                    indicator: 'Saving...',
                    tooltip: 'Edit',
                    data   : " {'0':'0','1':'1','2':'2','3':'3','4':'4','5':'5','6':'6'}",
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'acadhead/edit_course_unit_lec/',
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
                    indicator: 'Saving...',
                    tooltip: 'Edit',
                    data   : " {'0':'0','1':'1','2':'2','3':'3','4':'4','5':'5','6':'6'}",
                    type: 'select',
                    submit   : 'OK',
                    sUpdateURL: APP_URL+'acadhead/edit_course_unit_lab/',
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
    });
