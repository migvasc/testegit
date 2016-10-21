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

            $.ajax({
                url: "assets/post/check_login.php",
                type: "POST",
                data: {
                    email: email,
                    senha: senha
                },
                cache: false,
                success: function(resposta) {
                    if(resposta != null && resposta != ""){
                        alert("Bem-vindo(a), "+resposta);
                        $('#success').html("<div class='alert alert-success'>");
                        $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#success > .alert-success')
                            .append("<strong>Usuário entrou no sistema com sucesso. </strong>");
                        $('#success > .alert-success')
                            .append('</div>');
                    }
                        
                    else{
                        $('#success').html("<div class='alert alert-danger'>");
                        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                        $('#success > .alert-danger').append("<strong>E-mail ou senha incorretos. Por favor, verifique as informações!");
                        $('#success > .alert-danger').append('</div>');
                    }
                        
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Não conseguimos acessar nosso servidor :/ Desculpe-nos o transtorno e tente novamene mais tarde.");
                    $('#success > .alert-danger').append('</div>');
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
