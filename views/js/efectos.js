var $myelement = $(".scroll_please"); // cache jQuery object

$(window).scroll(function() {
   if($(this).scrollTop() < 30 && $myelement.is(":hidden")) {
       $myelement.fadeIn();
    } else if ($(this).scrollTop() > 30 && !$myelement.is(":hidden")) {
        $myelement.fadeOut();
    }	
});

