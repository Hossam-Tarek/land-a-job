$(function() {
    // let minus_offset = $("#application-text").offset().top;

    $('.application').on("click" ,function(){
        // let offset = $(this).offset().top;
        // $(".job").css("margin-top" , offset - 134);
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
                $(".job").insertAfter(".application-container[data-id = "+ job_id +"]");
            },
            error:function(error){
            }
    });
    });
});


let viewed = document.getElementsByClassName("viewed");
let applied = document.getElementsByClassName("applied");
let other_status = document.getElementsByClassName("other-status");

for(let i=0 ; i< viewed.length ; i++){

    if(viewed[i].children[0].children[0].textContent == "Viewed "){
        let applyPoint = viewed[i].children[0].children[1].children[0].classList.add("active-point");
        let applyLine = applied[i].children[0].children[1].children[1].classList.add("active-line");
    }
}

for(let i=0 ; i< other_status.length ; i++){
    
    let status_text = other_status[i].children[0].children[0];

    if(status_text.textContent != " No action yet "){
        let applyPoint = other_status[i].children[0].children[1].children[0].classList.add("active-point");
        let applyLine = viewed[i].children[0].children[1].children[1].classList.add("active-line");
        if(status_text.textContent == "In consideration "){
            status_text.classList.add("in-consideration" , "font-weight-bold");
        }
        else if(status_text.textContent == "Not selected "){
            status_text.classList.add("text-danger" , "font-weight-bold");
        }
        else if(status_text.textContent == "Selected "){
            status_text.classList.add("text-success", "font-weight-bold");
        }

    }
}
