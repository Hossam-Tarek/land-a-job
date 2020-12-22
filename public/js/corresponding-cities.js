$("#country").on('change', function () {
    // Show loading when request sent
    $("#loading_untill_request_done").fadeIn(300);
    $.ajax({
        url: "/getCitiesOfCountries",
        method: 'POST',
        data: { country: $(this).val() },
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (response) {
            if (response) {
                $('#city').empty();
                $('#city').append("<option selected disabled value=\"\">Select City</option>");
                for (let key in response) {
                    city = "<option value=" + response[key].id + " >" + response[key].name + "</option>";
                    $('#city').append(city);
                }
                // Show loading when request sent
                $("#loading_untill_request_done").fadeOut(100);
            }
        },
    });
});
