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
                success: function() {
                    // Success message
                    alert("Cadastro efetuado com sucesso! \nFaça login e comece a ajudar :)");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong> Usuário já cadastrado!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#loginForm').trigger("reset");
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
