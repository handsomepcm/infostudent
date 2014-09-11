$(document).ready(function(){
    tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "pagebreak,style,layer,table,save,advhr,emotions,iespell,inlinepopups,insertdatetime,preview,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true
    });

    var form = $( "#input_instrument" );
    form.validate({
        rules: {
            personnel: "required",
            question: "required",
            type: "required"
        },
        submitHandler: function(form) {
            $.ajax({
                url: APP_URL+"services/check_instrument_input",
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(msg) {
                    if (msg!=1) {;
                        alert("Not Saved "+msg);
                    }
                    else
                    {
                        alert("Saved");
                        window.location.href = APP_URL+'services/manage_instrument';
                    }
                }
            });
        }
    });
});