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

    var form = $( "#input_candidacy" );
    form.validate({
        rules: {
            reason: "required",
            party: "required",
            position: "required"
        },
        submitHandler: function(form) {
            $.ajax({
                url: APP_URL+"student/check_submission_input",
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
                        window.location.href = APP_URL+'student/sc_voting';
                    }
                }
            });
        }
    });
});
function votei()
  {
      var answer = confirm("Are you sure you want to send individual vote?")
      if (answer){
          document.messages.submit();
      }
      return false;  
  }
  function votep()
  {
      var answer = confirm("Are you sure you want to send party vote?")
      if (answer){
          document.messages.submit();
      }
      return false;  
  }
$(window).load(function(){
    $('#submit').hide();
    $(":radio").change(function() {
        var names = {};
        $(':radio').each(function() {
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function() { 
            count++;
        });
        if ($(':radio:checked').length === count) {
            alert("All Fields Filled");
            $('#submit').show();
        }
    }).change();
});