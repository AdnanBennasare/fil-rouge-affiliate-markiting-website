$(document).ready(function() {
    $('#subscribeForm').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var form = $(this);
        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            $('.valid-feedback').fadeOut(200); // Hide success message if form is invalid
            $('.invalid-feedback').fadeIn(200); // Show invalid message if form is invalid
        } else {
            submitForm();
        }
    });

    function submitForm() {
        var email = $('#email').val();
        $.ajax({
            type: 'POST',
            url: 'subscribe.php',
            data: { email: email },
            success: function (response) {

              $('#successMessage').html('');
                console.log(response);
                // Hide the form, clear its contents, and show the success message
                $('#subscribeForm').hide().trigger('reset');
                // $('#successMessage').html('').text(response)

                var productHTML = `<h3 class="text-center" style="color: #dba24e;" > ${response} <i class="bi bi-check-circle-fill" style="font-size: 6rem;"></i></h3>`;

                $('#successMessage').append(productHTML).fadeIn(200).delay(60000).fadeOut(200);


            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                $('.invalid-feedback').fadeIn(200).delay(0).fadeOut(200);
            }
        });
    }
});