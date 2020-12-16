
///////////////////////////////////// START Handling admin sidebar /////////////////////////////////////

$('.dropDownList').on("click", function () {
  $(this).children().last().children().first().toggleClass('fa-angle-down fa-angle-right');
  $(this).next().slideToggle();
});

$('.sidebar-button').on('click', function () {
  if ($('.sidebar').css('left') == '0px')
    {
      $('.sidebar').animate({ left: -250 }, 100);
      $(this).animate({left:10},500);
    }
  else
    {
      $('.sidebar').animate({ left: 0 }, 100);
      $(this).animate({left:260},500);
    }
});
///////////////////////////////////// END Handling admin sidebar /////////////////////////////////////

  $('.view').on("click" ,function(){
    let value = (parseInt($(this).val()))?0:1;
    const that = $(this);
      $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "/admin/messages/updateMessageStatus",
          method:'put',
          data:{
            messageID: $(this).prev().val(),
            viewed_status: value,
          },
          success: function(){
              that.children('i').toggleClass("fa-eye fa-eye-slash");
          }
     })
  });



