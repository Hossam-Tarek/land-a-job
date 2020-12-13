
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

