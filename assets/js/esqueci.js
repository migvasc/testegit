// Cadastro Form Scripts

$(function() {

    $("#esqueciForm input,#esqueciForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var email = $("input#email").val();
            var resposta = $("input#pergunta").val();
            var novasenha1 = $("input#senha1").val();
            var novasenha2 = $("input#senha2").val();
            
            
            if(novasenha1 != novasenha2){
                $('#success').html("<div class='alert alert-danger'>");
                $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                $('#success > .alert-danger').append("<strong> As senhas não conferem!");
                $('#success > .alert-danger').append('</div>');
            }    
            else{
                $.ajax({
                    url: "assets/post/check_esqueci.php",
                    type: "POST",
                    data: {
                        email: email,
                        novasenha1: novasenha1,
                        resposta: resposta
                    },
                    cache: false,
                    success: function(resposta) {
                        if(resposta != null && resposta != ""){
                            $('#success').html("<div class='alert alert-success'>");
                            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                                .append("</button>");
                            $('#success > .alert-success')
                                .append("<strong>Senha alterada com sucesso. </strong>");
                            $('#success > .alert-success')
                                .append('</div>');
                            //alert("Bem-vindo(a), "+resposta);
                            window.location.assign("home/index.php?email="+resposta);
                        }
                        else{
                            $('#success').html("<div class='alert alert-danger'>");
                            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                            $('#success > .alert-danger').append("<strong>Pergunta + email fornecido não foram correspondidos");
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
            }
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
