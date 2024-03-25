function upvote(Id, x){
    $.post("handleVote.php",{id: Id, type: "up", x:x}, function(response) {
        if(response == "not logged"){
            alert("Please log in first");
        }else{
            location.reload();
        }
    });
}

function downvote(Id, x){
    $.post("handleVote.php",{id: Id, type: "down", x:x}, function(response) {
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

function joinSub(UserId, SubforumName){
    //console.log(UserId,SubforumName);
    $.post("handleJoin.php",{userid: UserId, forumName:SubforumName}, function(response){
        if(response == "not logged"){
            alert("Please log in first");
        }
        if(response == "Joined"){
            alert("joined");
            location.reload();
        }
    })
    
}

function addComment(id,logged){
    if(logged == true){
        window.location.href = "comment.php?id=" + id;
    }else{
        alert("Please log in first");
    }
}
