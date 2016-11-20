<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />

    <title>Pet Ajuda | Login</title>
    
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logo-icone" id="icone-painel-login"></div>
                                <form name="sentMessage" id="loginForm" novalidate>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Insira seu  e-mail*" id="email" required data-validation-required-message="Por favor insira seu e-mail.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Insira sua  senha*" id="senha" required data-validation-required-message="Por favor, insira sua senha."></textarea>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12 text-center">
                                            <div id="success"></div>
                                            <button type="submit" id="enviar" class="btn btn-primary full-width">Entrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>  
                             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                             Ainda não tem uma conta? Cadastre-se <a href="cadastro.php" class="page-scroll">aqui</a>.
                             <br /> &emsp;
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
    <script src="assets/js/login.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/agency.min.js"></script>

</body>

</html>
