

$(".dropdown-item-content-details").click(function() {
    $('.dropdown-temporadas-content-details').text($(this).text());
})


$('.icon-play-content-details').click(function (e) {
    
});



$('.icon-show-content-details').on('click', function (e) { 
    if ($(this).hasClass('bx-show')){
        $(this).removeClass('bx-show');
        $(this).addClass('bxs-show checked text-info');
    }else {
        $(this).removeClass('bxs-show');
        $(this).addClass('bx-show');
        $(this).removeClass('checked text-info');
    }
    
});