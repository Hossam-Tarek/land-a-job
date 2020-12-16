$(function () {
    /* edit section */
    const iconContentContainer = $('.icon-content-container'),
        editSectionContent = $('.edit-section .edit-section-content');

    iconContentContainer.on('click', function () {
        // reset all children
        $(this).parent().children().css('border-bottom', '2px solid rgb(73, 75, 87)');
        $(this).parent().find('i').css('color', 'rgb(73, 75, 87)');

        if (editSectionContent.children(`div:eq(${$(this).data('index') - 1})`).css('display') == 'none') {
            // display and hide elements
            editSectionContent.children().css('display', 'none');
            editSectionContent.children(`div:eq(${$(this).data('index') - 1})`).css('display', 'block');
        }
        // assign new values
        $(this).css('border-bottom', '2px solid rgb(52, 200, 253)');
        $(this).find('i').css('color', 'rgb(52, 200, 253)');
    })

    /* Phone Section */
    var selectedPhoneId, selectedPhoneValue;
    $('#phone-select').on('change', function () {
        $('#form-action-controller').css('display', 'flex');
        selectedPhoneValue = $(this).find(":selected").text();
        selectedPhoneId = $(this).val();
        $('#edit-number-input').val(selectedPhoneValue);
        // $('#edited_number_id').val(selectedPhoneId);
        $('#show-add-new-phone').css('display', 'none');
        let deletePhoneForm = $('#delete-phone-form');
        let routeUrl = deletePhoneForm.attr('action');
        let lastIndex = routeUrl.lastIndexOf("/");
        deletePhoneForm.attr('action',routeUrl.substring(0, lastIndex) + "/" + selectedPhoneId);
    })

    $('#show-phone-edit-btn').on('click', function () {
        $('#edit-number-input-container').css('display', 'flex');
        $('#phone-delete-btn').css('display', 'none');

        $('#phone-edit-btn').css('display', 'inline-block');
        $(this).css('display', 'none');
    })

    $('#show-add-new-phone').on('click', function () {
        $('#new-number-input-container').css('display', 'flex');
        $('#phone-select').css('display', 'none').prev().css('display', 'none');
        $('#add-new-phone').css('display', 'inline-block');
        $(this).css('display', 'none');
    })

    let vacancy = $(".vacancy").text();
    vacancy = vacancy.replace(/\s/g,'');
    $(".vacancy").text(vacancy);
});
$('.viewd').on("click" ,function(){
    let user_id = $(this).attr("data-user-id");
    let job_id = $(this).attr("data-job-id");
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/company/updateViewedStatus' + '/' + user_id + '/' + job_id,
        method:'put',
        success: function(){
            window.location.href = "/profiles/" + user_id;
        }
  });
});
