$(document).ready(function () {
    var $error = $('<center><label class="text-danger" style="color: red;">Please enter your login info!</label></center>');
    var $error1 = $('<center><label class="text-danger" style="color: red;">Wrong Credentials! Please try again!</label></center>');

    $('.input-submit').click(function (e) {
        e.preventDefault();
        $error.remove();
        $error1.remove();
        $('#username_warning').removeClass('has-error has-feedback');
        $('#username_warning').find('span').remove();
        $('#password_warning').removeClass('has-error has-feedback');
        $('#password_warning').find('span').remove();

        var $username = $('#username').val();
        var $password = $('#password').val();

        if ($username === "" || $password === "") {
            $error.appendTo('#result');

            if ($username === "") {
                $('#username_warning').addClass('has-error has-feedback');
                $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').appendTo('#username_warning');
            }

            if ($password === "") {
                $('#password_warning').addClass('has-error has-feedback');
                $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').appendTo('#password_warning');
            }
        } else {
            $.post('check_admin.php', { username: $username, password: $password },
                function (result) {
                    if (result === 'Success') {
                        window.location = 'home.php';
                    } else {
                        $.post('check_stuff.php', { username: $username, password: $password },
                            function (result) {
                                if (result === 'Success') {
                                    window.location = 'home.php';
                                } else {
                                    $error1.appendTo('#result');
                                }
                            }
                        );
                    }
                }
            );
        }
    });
});
