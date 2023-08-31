;(function($) {
    $('#wedevs-enquiry-form').on('submit', function(e) {
       e.preventDefault();

       var data = $(this).serialize();

        $.post( weDevsAcademy.ajaxurl, data, function ( data ) {

        })
        .fail( function () {
            alert(weDevsAcademy.error);
        })

    });
})(jQuery);