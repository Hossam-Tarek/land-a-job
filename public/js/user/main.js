$(function() {
    let minus_offset = $("#application-text").offset().top;
    $('.application').on("click" ,function(){
        let offset = $(this).offset().top;
        $(".job").css("margin-top" , offset - 137);
        $(this).parent().addClass('active-application').siblings().removeClass('active-application');

        let job_id = $(this).attr("data-id");
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/user/'+ job_id +'/count',
            method:'get',
            data:{
                job_id: job_id,
            },
            dataType: 'json',
            success: function(dataResult){
                var dataResult = JSON.parse(JSON.stringify(dataResult));
                $('.job_title').text(dataResult.job.title);
                $('.job-city').text(dataResult.city +',');
                $('.country').text(dataResult.country);
                $('.vacancy').text(dataResult.job.vacancies);
                $('.viewed-count').text(dataResult.viewedApplicationCount);
                $('.notselected-count').text(dataResult.notSelectedApplicationCount);
                $('.inconsediration-count').text(dataResult.inConsiderationApplicationCount);
                $('.applied-count').text(dataResult.appliedApplicationCount);


            },
            error:function(error){
                console.log("error");
            }
    });

    });
});

// window.addEventListener('load', function() {
//     //get the element
//     var elem = document.getElementById('job');
//     //get the distance scrolled on body (by default can be changed)
//     var distanceScrolled = document.body.scrollTop;
//     //create viewport offset object
//     var elemRect = elem.getBoundingClientRect();
//     //get the offset from the element to the viewport
//     var elemViewportOffset = elemRect.top;
//     //add them together
//     var totalOffset = distanceScrolled + elemViewportOffset;
//     //log it, (look at the top of this example snippet)
//     console.log(totalOffset);
// });

