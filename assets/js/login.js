// Login Form Scripts

$(function() {

    $("#loginForm input,#loginForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var email = $("input#email").val();
            var senha = $("input#senha").val();

            loc = window.location.pathname.replace("login.html","")


            $.ajax({
                url: "assets/post/check_login.php",
                type: "POST",
                data: {
                    email: email,
                    senha: senha
                },
                cache: false,
                success: function() {
                    // Success message
                    alert("Funcionou");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>E-mail ou senha incorretos. Por favor, verifique as informações!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#loginForm').trigger("reset");
                },
            });
            /*$.ajax({
                url: "assets/post/check_login.php",
                type: "POST",
                data: {
                    email: email,
                    senha: senha
                }
            }).done(function(resposta) {
                alert(resposta);

            }).fail(function(jqXHR, textStatus ) {
                alert("Request failed: " + textStatus);

            }).always(function() {
            });*/

            
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
