<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pet Ajuda | Cadastro</title>
    
    <?php 
//        echo isset($_SESSION);
  //      die(); 
        session_name("testando");
        session_start();
        if(isset($_SESSION['user'])) {
            header("Location: home/index.php");
            exit();
        }
        
    ?>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/style.css"/>


    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="assets/css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <?php include("menu.php"); ?>

    <div class="container-fluid full-height" id="fundo-login">
            <div class="container full-height">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1 col-xs-offset-1 fade">
                        <div class="panel panel-default" id="painel-login">
                            <div class="panel-body">
                                <form name="cadastro" id="cadastroForm" novalidate>
                                    <div class="row">
                                        &emsp;Preencha as informações abaixo solicitadas para continuar com seu cadastro:
                                        <br />&emsp;<br />&emsp;
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Insira seu nome *" id="nome" required data-validation-required-message="Por favor, insira seu nome.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Insira seu sobrenome *" id="sobrenome" required data-validation-required-message="Por favor, insira seu sobrenome.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Insira seu e-mail *" id="email" required data-validation-required-message="Por favor, insira seu e-mail.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control" placeholder="Insira seu telefone" id="phone">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Insira sua senha *" id="senha1" required data-validation-required-message="Por favor, insira uma senha.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Confirme sua senha *" id="senha2" required data-validation-required-message="Por favor, confirme sua senha inserindo-a novamente no campo acima.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Qual o nome do seu primeiro amigo animal?" id="pergunta"> <!--  required data-validation-required-message="Por favor, responda a pergunta de recuperacao de senha." -->
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12 text-center">

                                            <div id="success"></div>
                                            <button type="submit" class="btn btn-primary full-width">Cadastrar</button>
                                    </div>
                                </form>
                            </div>  
                            <br />&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            Ja é cadastrado? Entre <a href="login.php" class="page-scroll">aqui</a>.
                             <p></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
     <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/cadastro.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/agency.min.js"></script>
</body>

</html>
