$(document).ready(function(){
   
    get_hall();
    manage_hall();

});

function get_hall(){

    $(document).on('click', '#moreInfo', function(){

        var Id = $(this).attr('data-id');
    //    console.log(Id);
        // $.ajax({
        //     url: 'get_record.php',
        //     method: "post",
        //     data: {id:Id},
        //     dataType: 'JSON',
        //     success: function(data){
        //         console.log(data[2]);
        //     }
        // });
        
    });
}

function manage_hall{
   
//   window.onload = function(){
    // var more = document.getElementById("title").te
    // console.log(more);

    // var more = $("#title").text();
    //   if(more){
    //     alert(more);
    //   }
//  }
}