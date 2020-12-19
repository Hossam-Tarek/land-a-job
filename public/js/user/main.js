$(function() {
    let offset;
    let vacancy = "vacancy";
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
                $('.job-show').attr('href' , '/company/show-Job/'+ dataResult.job.id);
                console.log( );
                $('.country').text(dataResult.country);
                if(dataResult.job.vacancies > 1){
                    vacancy = "vacancies"
                }
                $('.vacancy').text(dataResult.job.vacancies + " " +vacancy);
                $('.viewed-count').text(dataResult.viewedApplicationCount);
                $('.notselected-count').text(dataResult.notSelectedApplicationCount);
                $('.inconsediration-count').text(dataResult.inConsiderationApplicationCount);
                if(dataResult.appliedApplicationCount > 1){
                    $('.applicant').text("Applicants");
                }
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

    var win = $(this); 
    $(window).on('resize', function(){
        if (win.width() < 1024 && win.width() > 766) {
            $(".job-content").removeClass("col-lg-5").addClass("col-lg-6");
            $(".jobs-container").removeClass("col-lg-7").addClass("col-lg-6");
        }
    });

    if (win.width() < 1026 && win.width() > 748) {
        $(".job-content").removeClass("col-lg-5").addClass("col-lg-6");
        $(".jobs-container").removeClass("col-lg-7").addClass("col-lg-6");
        $(".line").css("width" , 110)
    }
});


