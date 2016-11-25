<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Pet Ajuda | Perfil</title>
    
    
     <?php 
//        echo isset($_SESSION);
  //      die(); 
        session_name("testando");
        session_start();
        
        if(!isset($_SESSION['user'])) { //se sessão nao existe
             //ve se pode criar uma
            if ($_GET["email"] != "") {
                //se sim, cria
                $_SESSION['user'] = $_GET["email"];
            } else {
                //se nao, redireciona pro login
                //die("sessao nao encontrada, é preciso login"); 
                header("Location: ../login.php");
                exit();
            }
            //die("funcionou: " . $_GET["user"]); 
        }
        
        require("../conn.php");
        $result = pg_query($conn, "select email, nome, sobrenome, phone, endereco_logradouro, endereco_numero, endereco_complemento, endereco_bairro, endereco_cidade, endereco_estado, resposta, tipo from usuario where email = '". htmlentities($_SESSION['user'], ENT_QUOTES, "UTF-8")."'");
        $var1 = pg_fetch_row($result);
        $email = $var1[0];
        $nome = $var1[1];
        $sobrenome = $var1[2];
        $telefone = $var1[3];
        $logradouro = $var1[4];
        $numero = $var1[5];
        $complemento = $var1[6];
        $bairro = $var1[7];
        $cidade = $var1[8];
        $estado = $var1[9];
        $resposta = $var1[10];
        $perfil = $var1[11];
        
        $perfis = ['anfitriao','padrinho','ONG']
    ?>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>

      <?php include("menu.php"); ?>
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
            
              <!--overview start-->
			<!--   
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-paw"></i>
						<div class="count">293</div>
						<div class="title">Pets resgatados</div>						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">13</div>
						<div class="title">ONGs ativas</div>						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">431</div>
						<div class="title">Anfitriões cadastrados</div>						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">158</div>
						<div class="title">Pets adotados</div>						
					</div>
				</div>
				
			</div>
		
			
           <div class="row">
		    <div class="col-lg-9 col-md-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
							<div class="panel-actions">
								<a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>	
						</div>
						<div class="panel-body-map">
							<div id="map" style="height:380px;"></div>	
						</div>
	
					</div>
				</div>
              
                   
                <!-- statics end -->
                
              <div class="container-fluid full-height" id="fundo-login">
                <div class="container full-height">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1 col-xs-offset-1">
                        <div class="panel panel-default" id="painel-login">
                            <div class="panel-body">
                                <form name="perfil" id="perfilForm" novalidate>
                                    <div class="row">
                                        <p><h3> Meu perfil</h3></p>
                                        <br />
                                        <p align="left">
                                        &emsp;Essas são as informações que nós temos cadastradas sobre você.
                                        </p>
                                        <br />
                                        <p align="left">
                                        &emsp;Atualize os campos que precisarem de alteração e clique em <i>Atualizar</i>
                                         </p>
                                        <br />&emsp;<br />&emsp;
                                        <div class="col-md-12">
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12 text-center">
                                            <div class="form-group">
                                                <p align="left">Nome</p>
                                                <input type="text" class="form-control" placeholder="Insira seu nome *" id="nome" value="<?=$nome ?>" required data-validation-required-message="Por favor, insira seu nome.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Sobrenome</p>
                                                <input type="text" class="form-control" placeholder="Insira seu sobrenome *" id="sobrenome" value="<?=$sobrenome ?>" required data-validation-required-message="Por favor, insira seu sobrenome.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Telefone</p>
                                                <input type="text" class="form-control" placeholder="Insira seu telefone" id="phone" value="<?=$telefone ?>">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Endereco </p>
                                                <input type="text" class="form-control" placeholder="Insira o logradouro do seu endereco" id="endereco" value="<?=$logradouro ?>"></p>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Número </p>
                                                <input type="text" class="form-control" placeholder="Insira o número do seu endereço" id="numero" value="<?=$numero ?>"></p>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Complemento </p>
                                                <input type="text" class="form-control" placeholder="Insira o complemento do seu endereço (se houver) " id="complemento" value="<?=$complemento ?>"></p>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Bairro </p>
                                                <input type="text" class="form-control" placeholder="Insira o bairro do seu endereço" id="bairro" value="<?=$bairro ?>"></p>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Cidade </p>
                                                <input type="text" class="form-control" placeholder="Insira a cidade do seu endereço" id="cidade" value="<?=$cidade ?>"></p>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Estado </p>
                                                <input type="text" class="form-control" placeholder="Insira a sigla do Estado do seu endereço" id="estado" value="<?=$estado ?>"></p>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Qual o nome do seu primeiro amigo animal?</p>
                                                <input type="text" class="form-control" placeholder="Qual o nome do seu primeiro amigo animal?" id="pergunta" value="<?=$resposta ?>" required data-validation-required-message="Por favor, responda a pergunta de recuperacao de senha."> <!--   -->
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group" align = "left"> 
                                                <p align="left">Qual é o tipo de perfil que você deseja ter? </p>
                            
                                                <select id="tipo" style="width: 100%">
                                                    <?php 
                                                      foreach ($perfis as $perfil_op) {
                                                          $option = ($perfil_op == "anfitriao")? "Anfitrião":(($perfil_op == "padrinho")?"Padrinho":"ONG");
                                                          $selected = ($perfil == $perfil_op) ? "selected=\"selected\"" : null;
                                                          echo "<option value='" . $perfil_op . "' " . $selected . ">" . $option . "</option>";
                                                      }
                                                    ?>
                                                </select>
                                                <p></p>
                                                <p>&emsp;Não sabe qual o perfil mais adequado a você? Clique <a href="../index.php#about" target="_blank">aqui</a> e confira!</p>
                                               
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div id="success"></div>
                                            
                                            <input type="hidden" id="email" value="<?=$email ?>">
                                            <button type="submit" id="atualizar" class="btn btn-primary">Atualizar</button>
                                    </div>
                                </form>
                            </div> 
                             <p></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
          
                
                
                
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    
    
    
    
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	
	<script src="../assets/js/jqBootstrapValidation.js"></script>
	<script src="../assets/js/perfil.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

  </body>
</html>
