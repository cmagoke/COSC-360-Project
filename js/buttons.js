function upvote(PostId){
    $.post("handleVote.php",{postid: PostId, type: "up"}, function(response) {
        if(response == "not logged"){
            alert("Please log in first");
        }else{
            location.reload();
        }
    });
}

function downvote(PostId){
    $.post("handleVote.php",{postid: PostId, type: "down"}, function(response) {
        if(response == "not logged"){
            alert("Please log in first");
        }else{
            location.reload();
        }
    });
}

function disable(UserId){
    $.post("disableUser.php",{userid: UserId}, function(response) {
        // Handle the response from the server
        console.log(response);
        location.reload();
    });
}

function enable(UserId){
    $.post("enableUser.php",{userid: UserId}, function(response) {
        // Handle the response from the server
        console.log(response);
        location.reload();
    });
}

function editPost(PostId){
    window.location.href = "editPost.php?p=" + PostId;
}

function deletePost(PostId){
    var result = confirm("Are you sure you want to delete this post?")
    if(result){
        $.post("deletePost.php",{postid: PostId, type: "delete"}, function(response) {
            // Handle the response from the server
            console.log(response);
            location.reload();
        });
    }
}