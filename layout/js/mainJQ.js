$(function(){
    'use strict';

    $('[placeholder]').focus( function(){
        $(this).attr('data-text',$(this).attr('placeholder'));
        $(this).attr('placeholder','');
    }).blur(function(){
        $(this).attr('placeholder',$(this).attr('data-text'));
    });
    
    $('input').each(function() {
        if ($(this).attr('required' ) === 'required') {
            $(this).after('<span class= "asterisk">*</span>');
        }
    });

    var passI = $('.password');
    $('.show-pass').click(function(){
        passI.attr('type','text');
    }, function() {
        passI.attr('type','password');
    });


    $('.confirm').click( function () {
        return confirm('are you sure ?')
    });

    $('.confirm').click( function () {
        return confirm('are you sure ?')
    });

}
);