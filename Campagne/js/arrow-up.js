$(document).ready(function(){
    $('#arrow-scroll').css("display","none");
    $(window).scroll(function(){
        if ((  $(window).height()*0.5 - $(window).scrollTop()) < 0) {
            // console.log( $(window).height()*0.5 - $(window).scrollTop() + "cas1");
            $('#arrow-scroll').fadeIn('slow', 'easeInCubic');
        } 
        else {
            // console.log( $(window).height()*0.5-$(window).scrollTop());
            $('#arrow-scroll').fadeOut('slow');
        }
    });
    $('#arrow-scroll').click(function(){
        $('html, body').animate({scrollTop: 0}, 5000, 'easeInOutQuint');
    });
});