$(document).ready(function () {
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
});