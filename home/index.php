<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Pet Ajuda | Home</title>
    
    
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
                # get user infos that are used in this page
                require("../conn.php");
                $result = pg_query($conn, "select nome, email, phone, tipo, endereco_logradouro, endereco_numero, endereco_bairro,endereco_cidade from usuario where email = '".htmlentities($_SESSION['user'], ENT_QUOTES, "UTF-8")."'");
                $user_info = pg_fetch_row($result);
                $_SESSION['nome'] = $user_info[0];
                $_SESSION['email'] = $user_info[1];
                $_SESSION['phone'] = $user_info[2];
                $_SESSION['tipo'] = $user_info[3];
                $_SESSION['endereco_logradouro'] = $user_info[4];
                $_SESSION['endereco_numero'] = $user_info[5];
                $_SESSION['endereco_bairro'] = $user_info[6];
                $_SESSION['endereco_cidade'] = $user_info[7];
                header("Location: ../home/");
                exit();
            } else {
                //se nao, redireciona pro login
                //die("sessao nao encontrada, é preciso login"); 
                header("Location: ../login.php");
                exit();
            }
            //die("funcionou: " . $_GET["user"]); 
        }
    
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
			  
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-paw"></i>
						<div class="count">293</div>
						<div class="title">Pets resgatados</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">13</div>
						<div class="title">ONGs ativas</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">431</div>
						<div class="title">Anfitriões cadastrados</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">158</div>
						<div class="title">Pets adotados</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		
			
           <div class="row">
		    <div class="col-lg-9 col-md-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-map-marker red"></i><strong>Mapa da localização dos usuários do Pet Ajuda perto de você</strong></h2>
						    <?php 
						        if($_SESSION['endereco_logradouro'] == '')
						            echo  "<h5> Cadastre seu endereço e mantenha-o sempre atualizado para que possamos te mostrar tudo que acontece ao seu redor :) </h5>";
						        else
						            echo " <h5> Mantenha seu endereço sempre atualizado para que possamos te mostrar tudo que acontece ao seu redor :) </h5>"
						    ?>
						<div class="panel-body-map">
      				<input  id="txtMapa" name="txtMapa" />
              
							<div id="map" style="height:380px; width: 100%">
							    <br />
							    <br />
							    <br />
							    <p align="center"><img src="http://www.diversityabroad.com/img/loader.gif" style="height:50px; width: 50px"></p>
							    <p align="center"><h5 align="center"> Carregando as informações dos usuários perto de você...</h5></p>
						    </div>	
						</div>
					</div>
				</div>
              <!--<div class="col-md-3">
				<ul class="today-datas">
				<li>
                  <div><span id="todayspark1" class="spark"></span></div>
                  <div class="datas-text">11,500 visitors/day</div>
                </li>
                <li>
                  <div><span id="todayspark2" class="spark"></span></div>
                  <div class="datas-text">15,000 Pageviews</div>
                </li>
                <li>
                  <div><span id="todayspark3" class="spark"></span></div>
                  <div class="datas-text">30.55% Bounce Rate</div>
                </li>
                <li>
                  <div><span id="todayspark4" class="spark"></span></div>
                  <div class="datas-text">$16,00 Revenue/Day</div>
                </li> 
                <li>
                  <div><span id="todayspark5" class="spark"></span></div>
                  <div class="datas-text">12,000000 visitors every Month</div>
                </li>                                                                                                              
              </ul>
              </div> -->
			 
           </div>  
            
		  
		  <!-- Today status end -->
			

                    
                   
                <!-- statics end -->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    
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
	 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA725OG4Uyt_o2gyuM00U9PcytQroKmdrU&amp;sensor=false"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../assets/js/mapa.js"></script>
  <!--<script>

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

  </script>-->

  </body>
</html>
