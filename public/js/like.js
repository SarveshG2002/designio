function  likeme(id){
    $.ajax({
        type: 'POST',
        url: '/api/post/likepost/'+id,
        // dataType: 'json',
        headers: {
            // Set the Authorization header with the bearer token
            Authorization: 'Bearer ' + document.getElementById('tok').value,
        },
        success: function (data) {
            // Request was successful
            // if(data.message == "Followed successfully"){
            //     document.getElementById('reqbut'+id).textContent="Followed"
            //     document.getElementById('reqbut'+id).style.backgroundColor = "Grey"
            // }else if(data.message == "Unfollowed successfully"){
            //     document.getElementById('reqbut'+id).textContent="Follow"
            //     document.getElementById('reqbut'+id).style.backgroundColor = "#673ab7"
            // }
            // console.log('Follow request sent successfully',data);
            // You can perform further actions here if needed
            console.log(data)
        },
        error: function (xhr, textStatus, errorThrown) {
            // Request failed
            console.error('Follow request failed');
        },
    })
    console.log("like id",id)
    $( "i,span" ).toggleClass( "press", 1000 );
}