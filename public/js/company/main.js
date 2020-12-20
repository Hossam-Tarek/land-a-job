$(function () {
    let vacancy = $(".vacancy").text();
    vacancy = vacancy.replace(/\s/g, '');
    $(".vacancy").text(vacancy);
});

$('.viewd').on("click" ,function(){
    let user_id = $(this).attr("data-user-id");
    let job_id = $(this).attr("data-job-id");
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/company/jobs/'+ job_id +'/users/'+ user_id +'/status',
        method:'put',
        success: function(){
            window.location.href = "/profiles/" + user_id;
        },
        error:function(error){
            console.log("error");
        }
    });
});
