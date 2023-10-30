function  likeme(id,uid){
    $.ajax({
        type: 'POST',
        url: '/api/post/likepost/'+id,
        // dataType: 'json',
        data: {uid:uid},
        headers: {
            // Set the Authorization header with the bearer token
            Authorization: 'Bearer ' + document.getElementById('tok').value,
        },
        success: function (data) {

            if(data.message=="liked"){
                document.getElementById('mylikecuunt'+id).textContent=parseInt(document.getElementById('mylikecuunt'+id).textContent)+1
            }else{
                document.getElementById('mylikecuunt'+id).textContent=parseInt(document.getElementById('mylikecuunt'+id).textContent)-1
            }
            $( "#mylikeicon"+id ).toggleClass( "press", 1000 );
        },
        error: function (xhr, textStatus, errorThrown) {
            // Request failed
            console.error('Follow request failed');
        },
    })
    // console.log("like id",id)
   
}