//$(document).ready(function() {
  /*   $(".up_arrow").on("click",function(){
        var count = parseInt($(this).siblings(".vote_count").html());
        $(this).siblings(".vote_count").html(count+1);
    });
    $(".down_arrow").on("click",function(){
        var count = parseInt($(".vote_count").html());
        $(".vote_count").html(count-1);
    }); */

   // $("#disable").on("click",disable(UserId));
       /*  var entry = $('<div class="entry"></div>');
        var button = $('<button id="enable">Enable</button>');
        entry.append($(this).parent().html());
        entry.append(button);
        $("#disable_main").append(entry);
        $(this).parent().parent().remove(); */
//});

function disable(UserId){
    $.post("disableUser.php",{userid: UserId}, function(response) {
        // Handle the response from the server
        console.log(response);
        location.reload();
    });
    //alert("it worked");
}

function enable(UserId){
    $.post("enableUser.php",{userid: UserId}, function(response) {
        // Handle the response from the server
        console.log(response);
        location.reload();
    });
    //alert("it worked");
}

function editPost(PostId){
    
}

function deletePost(PostId){
    
}