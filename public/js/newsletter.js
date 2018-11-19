$('#js-newsletter-form').on('submit', function (e) {
    e.preventDefault();

    var email = this.email.value;
    var $form = $(this);

    $.ajax({
        method: $form.attr('method'),
        url: $form.attr('action'),
        data: {
            'email': email
        }
    })
    .done(function(response) {
        alert('Thank you!');

        console.log('[Newsletter] ' + response.message);
    });
});
