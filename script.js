

// show button
$('.show_button').click(function() {
    $('.show_container').show().fadeIn().animate({
        height: '100%',
        width: '100%',
    });
    $('.show_button').hide();
    $('.close_button').show();
});

$('.close_button').click(function() {
    $('.show_container').fadeOut().animate({
        height: '0%',
        width: '0%',
    });
    $('.close_button').hide();
    $('.show_button').show();
});

// Fade in new Order when order is placed:

// $('#Add_To_OrderPostions_Table_Button').click(function() {
// 	$('#OrderPosition_Table > tbody > tr:last-of-type').fadeOut()
// 	$('#OrderPosition_Table > tbody > tr:last-of-type').fadeIn()
// });

