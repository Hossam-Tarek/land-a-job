$(function (){
    /* Filter section */

    // Show filter body on click filter header
    $('.filter-header').on('click',function (){
        $(this).children('i').toggleClass('rotate-180').parent().next().slideToggle(300);
    })

    //  Show filter in small screen
    $('.show-filter-in-small-screen').on('click',function (){
        console.log($('.display-sm-none').slideToggle(300));
    });

    /* //////////////////////////////////////////  */
    /* Search and job section*/

})
