$(function(){
    $("select[name=voting]").change(function (){ //change event for select
        $.ajax({  //ajax call
            type: "POST",      //method == POST 
            url: APP_URL+"comelec/get_election_results", //url to be called
            data: { election_id: $("#voting option:selected").val()}, //data to be send 
            beforeSend: function(){
                $('#displayed').html('<img height="28" width="28" src="'+APP_URL+'public/images/loading.gif" />');
            },
            success: function(msg){
                $('#displayed').html(msg);
            }
        });
    });
    $("select[name=voter]").change(function (){ //change event for select
        $.ajax({  //ajax call
            type: "POST",      //method == POST 
            url: APP_URL+"comelec/get_election_voters_list", //url to be called
            data: { election_id: $("#voter option:selected").val()}, //data to be send 
            beforeSend: function(){
                $('#displayed').html('<img height="28" width="28" src="'+APP_URL+'public/images/loading.gif" />');
            },
            success: function(msg){
                $('#displayed').html(msg);
            }
        });
    });
});
