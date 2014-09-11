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

    var form1 = $( "#vote_party" );
    form1.validate({
        rules: {
            party: "required"
        },
        submitHandler: function(form) {
          if (confirm("You are about to submit vote by party, are you sure?")) {
            $.ajax({
                url: APP_URL+"student/vote_party",
                type: 'POST',
                data: form1.serialize(),
                success: function(msg) {
                    if (msg!=1) {;
                        alert("Not Saved "+msg);
                    }
                    else
                    {
                        alert("Votes Send");
                        window.location.href = APP_URL+'student/sc_voting';
                    }
                }
            });
          }
        }
    });

    var form2 = $( "#vote_individual" );
    form2.validate({
        rules: {
            president: "required",
            vpexternal: "required",
            vpinternal: "required",
            secretary: "required",
            treasurer: "required",
            auditor: "required",
            pro: "required"
        },
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio") {
                error.insertBefore(element);
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            if (confirm("You are about to submit votes, please recheck the the fields?")) {
              $.ajax({
                  url: APP_URL+"student/vote_individual",
                  type: 'POST',
                  data: form2.serialize(),
                  success: function(msg) {
                      if (msg!=1) {;
                          alert("Not Saved "+msg);
                      }
                      else
                      {
                          alert("Votes Send");
                          window.location.href = APP_URL+'student/sc_voting';
                      }
                  }
              });
            }
        }
    });
});