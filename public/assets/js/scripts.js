$(document).ready(function() {
    $("#idFormRegister").submit(function(e) {
        e.preventDefault(); //prevent default action
        let form_data = $(this).serializeArray(); //Encode form elements for submission
        console.log(form_data);
        $.ajax({
            url: 'http://fatimaweb.test/api/create.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            beforeSend: function() {
                $('.fa').css('display', 'inline');
            }
        }).done(function(response) { //
            console.log('Exito', response)
            if (response.success) {
                $('#message').removeClass('alert-warning').addClass('alert alert-success');
            } else {
                $('#message').removeClass('alert-success').addClass('alert alert-warning');
            }
            $('#message').html(response.message);
            console.log(response.message);
            window.location.href = '../index.php';
        }).fail(function(xhr, textStatus, error) {
            console.log('Error', xhr)
            console.warn(xhr.responseText);
            console.log('Error', error);
            console.log('TextStatus', textStatus);
            //$('span').html('Incorrecto');
        }).always(function() {
            $('.fa').hide();
        });
    });



    $("#idFormLogin").submit(function(e) {
        e.preventDefault(); //prevent default action
        let form_data = $(this).serializeArray(); //Encode form elements for submission
        console.log(form_data);
        $.ajax({
            url: 'http://fatimaweb.test/api/login.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            beforeSend: function() {
                $('.fa').css('display', 'inline');
            }
        }).done(function(response) { //
            console.log('Exito', response)
            if (response.success) {
                $('#message').removeClass('alert-warning').addClass('alert alert-success');
            } else {
                $('#message').removeClass('alert-success').addClass('alert alert-warning');
            }
            $('#message').html(response.message);
            console.log(response.message);
            window.location.href = '../index.php';
        }).fail(function(xhr, textStatus, error) {
            console.log('Error', xhr)
            console.warn(xhr.responseText);
            console.log('Error', error);
            console.log('TextStatus', textStatus);
            //$('span').html('Incorrecto');
        }).always(function() {
            $('.fa').hide();
        });
    });
});