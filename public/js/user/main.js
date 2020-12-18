$(function() {
    let offset;
    $('.application').on("click" ,function(){
        offset = $(this).parent().offset().top;
        const jobsContainerTopOffset = $('.jobs-container').offset().top;
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
                $(".job").removeClass("d-none").addClass("d-block");
                if($(window).width() <= 768){
                    $(".job").insertAfter(".application-container[data-id = "+ job_id +"]");
                }
                else{
                    let job = $(".job");
                    $(".job-container").append(job);
                    job.css("margin-top" , offset - jobsContainerTopOffset);
                }
            },
            error:function(error){
            }
        });
    });

});

