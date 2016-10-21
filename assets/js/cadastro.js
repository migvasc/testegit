// Login Form Scripts

$(function() {

    $("#cadastroinput,#cadastroForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var nome = $("input#nome").val();
            var sobrenome = $("input#sobrenome").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var senha1 = $("input#senha1").val();
            var senh2 = $("input#senha2").val();

            loc = window.location.pathname.replace("login.html","")


            $.ajax({
                url: "assets/post/check_cadastro.php",
                type: "POST",
                data: {
                    nome: nome,
                    sobrenome: sobrenome,
                    email: email,
                    phone: phone,
                    senha: senha
                },
                cache: false,
                success: function(respostas) {
                    if(resposta != null && resposta != ""){
                        alert("Bem-vindo(a), "+resposta);
                        $('#success').html("<div class='alert alert-success'>");
                        $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#success > .alert-success')
                            .append("<strong>Usuário cadastrado com sucesso. </strong>");
                        $('#success > .alert-success')
                            .append('</div>');
                    }
                    else{
                        $('#success').html("<div class='alert alert-danger'>");
                        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                        $('#success > .alert-danger').append("<strong>E-mail já cadastrado!");
                        $('#success > .alert-danger').append('</div>');
                    }
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong> Não conseguimos acessar nosso servidor :/ Desculpe-nos o transtorno e tente novamene mais tarde!");
                    $('#success > .alert-danger').append('</div>');
                },
            });
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
