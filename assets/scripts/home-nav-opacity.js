$(document).ready(function(){
    colorNav();
    if ($(window).width() >= 992) { // the check prevents uneccessary addition of event listener
        $(document).scroll(function(){
            colorNav();
        });
    }

    $(window).on('resize', function() {
        colorNav();
    })
});

function colorNav() {
    if ($(window).width() >= 992) {
        var position = $(document).scrollTop();

        var opacity = (position > 400) ? 1 : position / 400;
        $("#nav").css('background-color', 'rgba(27,159,181,' + opacity + ')');
    }
    else {
        $("#nav").css('background-color', 'rgba(27,159,181,' + 1 + ')');
    }
}
