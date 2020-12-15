/* Avatar */
function readURLForLogo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#logoPreview').css('background-image', 'url(' + e.target.result + ')');
            $('#logoPreview').hide();
            $('#logoPreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#logoUpload").on('change', function () {
    readURLForLogo(this);
    sendAjaxRequest('/company/uploadLogo', $('#upload-logo-form')[0]);
});

/* Cover Image */
function readURLForCoverImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#coverImagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#coverImagePreview').hide();
            $('#coverImagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#coverImageUpload").on('change', function () {
    readURLForCoverImage(this);
    sendAjaxRequest('/company/uploadCoverImage', $('#upload-cover-image-form')[0]);
});

function sendAjaxRequest(url, formElement) {
    $.ajax({
        url: url,
        method: 'POST',
        data: new FormData(formElement),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            const message = $('#image-uploaded-message');
            if (response.status) {
                message.html(response.message).css('display','block').attr('class', '').addClass(response.class_name);
            } else {
                message.css('display','block').attr('class', '').addClass(response.class_name);
                message.html('<ul class="mb-0"></ul>');
                response.message.forEach(element => {
                    message.children('ul').append(`<li>${element}</li>`);
                });
            }
            setTimeout(function () {
                message.fadeOut(500);
            },5000)
        },
    });
}