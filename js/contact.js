(function ($) {
    'use strict';

    var form = $('.contact__form'),
        message = $('.contact__msg'),

        // var form = document.getElementById("contact_form"),
        // message = document.getElementById("contact_msg"),    
        form_data;

    // Success function
    function done_func(response) {
        message.fadeIn().removeClass('alert-danger').addClass('alert-success');
                              
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
        form.find('input:not([type="submit"]), textarea').val('');
    }

    // fail function
    function fail_func(data) {
        message.fadeIn().removeClass('alert-success').addClass('alert-success');
        message.text(data.responseText);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    }
    
    form.submit(function (e) {
        e.preventDefault();
        form_data = $(this).serialize(); // old line
        $.ajax({
            type: 'POST',
            url: form.attr('action'),  // old line
            data: form_data,      //  old line
        })
        .done(done_func)
        .fail(fail_func);
    });
    
})(jQuery);