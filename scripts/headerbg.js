

// get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
var mainbottom = $('#main').offset().top + $('#main').height();

// on scroll, 
$(window).on('scroll',function(){

    // we round here to reduce a little workload
    stop = Math.round($(window).scrollTop());
    if (stop > mainbottom) {
        $('.navtrans').css({"background":"rgba(39, 32, 28, 0.7)"});
    } else {
       $('.navtrans').css({"background":"transparent"});
    }

});
 