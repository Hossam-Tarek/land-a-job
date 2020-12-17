///////////////////////////////////// START Handling admin sidebar /////////////////////////////////////

$('.dropDownList').on("click", function () {
  $(this).children().last().children().first().toggleClass('fa-angle-down fa-angle-right');
  $(this).next().slideToggle();
});

$('.sidebar-button').on('click', function () {
  if ($('.sidebar').css('left') == '0px') {
    $('.sidebar').animate({ left: -250 }, 100);
    $(this).animate({ left: 10 }, 500);
  }
  else {
    $('.sidebar').animate({ left: 0 }, 100);
    $(this).animate({ left: 260 }, 500);
  }
});
///////////////////////////////////// END Handling admin sidebar /////////////////////////////////////

///////////////////////////////////// START Handling admin message status /////////////////////////////////////
$('.view').on("click", function () {
  let value = (parseInt($(this).val())) ? 0 : 1;
  const that = $(this);
  $.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: "/admin/messages/updateMessageStatus",
    method: 'put',
    data: {
      messageID: $(this).prev().val(),
      viewed_status: value,
    },
    success: function () {
      that.children('i').toggleClass("fa-eye fa-eye-slash");
    }
  })
});
///////////////////////////////////// END Handling admin message status /////////////////////////////////////

///////////////////////////////////// START Handling admin message status /////////////////////////////////////
$(function() {
  if ($('#table1').length != 0) {
    $('#table1').DataTable();
    $("#table1_filter input")
      .addClass("form-control d-inline-block w-auto mb-2 mr-1")
      .attr("placeholder", "Search");
    $("#table1_filter label").css("margin", "0");
    document.querySelector("#table1_filter label").childNodes[0].remove()
  }
});
///////////////////////////////////// END Handling admin message status /////////////////////////////////////
