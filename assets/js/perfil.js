// Cadastro Form Scripts

$(function() {

    $("#perfilForm input,#perfilForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var email = $("input#email").val();
            var nome = $("input#nome").val();
            var sobrenome = $("input#sobrenome").val();
            var phone = $("input#phone").val();
            var resposta = $("input#pergunta").val();
            
                $.ajax({
                    url: "../assets/post/check_perfil.php",
                    type: "POST",
                    data: {
                        email: email,
                        nome: nome,
                        sobrenome: sobrenome,
                        phone: phone,
                        resposta: resposta
                    },
                    cache: false,
                    success: function(resposta) {
                        if(resposta != null && resposta != ""){
                            $('#success').html("<div class='alert alert-success'>");
                            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                                .append("</button>");
                            $('#success > .alert-success')
                                .append("<strong>Dados alterados com sucesso. </strong>");
                            $('#success > .alert-success')
                                .append('</div>');
                            window.location.assign("home/index.php");
                        }
                        else{
                            $('#success').html("<div class='alert alert-danger'>");
                            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                            $('#success > .alert-danger').append("<strong>Uh-oh");
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
