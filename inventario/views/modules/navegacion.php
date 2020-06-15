<?php
//Verifica que exista una sesion iniciada 
	if($_GET['action'] == 'salir'){
        header('location:index.php?action=ingresar');
    }

    $perfil = $_SESSION['perfil'];
    $usuario = $_SESSION['nombre_usuario'];
    

?>
<!doctype html>
<html class="no-js" lang="en">

<link rel="shortcut icon" type="image/x-icon" href="default/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="default/css/bootstrap.min.css">
    <link rel="stylesheet" href="default/css/font-awesome.min.css">
    <link rel="stylesheet" href="default/css/owl.carousel.css">
    <link rel="stylesheet" href="default/css/owl.theme.css">
    <link rel="stylesheet" href="default/css/owl.transitions.css">
    <link rel="stylesheet" href="default/css/animate.css">
    <link rel="stylesheet" href="default/css/normalize.css">
    <link rel="stylesheet" href="default/css/meanmenu.min.css">
    <link rel="stylesheet" href="default/css/main.css">
    <link rel="stylesheet" href="default/css/educate-custon-icon.css">
    <link rel="stylesheet" href="default/css/morrisjs/morris.css">
    <link rel="stylesheet" href="default/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="default/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="default/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="default/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="default/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="default/css/style.css">
    <link rel="stylesheet" href="default/css/responsive.css">



<script src="default/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="default/js/bootstrap.min.js"></script>
    <script src="default/js/wow.min.js"></script>
    <script src="default/js/jquery-price-slider.js"></script>
    <script src="default/js/jquery.meanmenu.js"></script>
    <script src="default/js/owl.carousel.min.js"></script>
    <script src="default/js/jquery.sticky.js"></script>
    <script src="default/js/jquery.scrollUp.min.js"></script>
    <script src="default/js/counterup/jquery.counterup.min.js"></script>
    <script src="default/js/counterup/waypoints.min.js"></script>
    <script src="default/js/counterup/counterup-active.js"></script>
    <script src="default/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="default/js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="default/js/metisMenu/metisMenu.min.js"></script>
    <script src="default/js/metisMenu/metisMenu-active.js"></script>
    <script src="default/js/morrisjs/raphael-min.js"></script>
    <script src="default/js/morrisjs/morris.js"></script>
    <script src="default/js/morrisjs/morris-active.js"></script>
    <script src="default/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="default/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="default/js/sparkline/sparkline-active.js"></script>
    <script src="default/js/calendar/moment.min.js"></script>
    <script src="default/js/calendar/fullcalendar.min.js"></script>
    <script src="default/js/calendar/fullcalendar-active.js"></script>
    <script src="default/js/plugins.js"></script>
    <script src="default/js/main.js"></script>
    <script src="default/js/tawk-chat.js"></script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Práctica 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="default/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="default/css/bootstrap.min.css">
    <link rel="stylesheet" href="default/css/font-awesome.min.css">
    <link rel="stylesheet" href="default/css/owl.carousel.css">
    <link rel="stylesheet" href="default/css/owl.theme.css">
    <link rel="stylesheet" href="default/css/owl.transitions.css">
    <link rel="stylesheet" href="default/css/animate.css">
    <link rel="stylesheet" href="default/css/normalize.css">
    <link rel="stylesheet" href="default/css/meanmenu.min.css">
    <link rel="stylesheet" href="default/css/main.css">
    <link rel="stylesheet" href="default/css/educate-custon-icon.css">
    <link rel="stylesheet" href="default/css/morrisjs/morris.css">
    <link rel="stylesheet" href="default/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="default/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="default/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="default/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="default/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="default/css/style.css">
    <link rel="stylesheet" href="default/css/responsive.css">
    <script src="default/js/vendor/modernizr-2.8.3.min.js"></script>
</head>



<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php?action=tablero"><img class="main-logo" src="default/img/logo/logo.png" alt="" /></a>
                <strong><a href="index.php?action=tablero"><img src="default/img/logo/logosn.png" alt="" /></a></strong>
         
            </div>

            
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a href="index.php?action=tablero">
								   <span class="fa fa-address-book"></span>
								   <span class="mini-click-non">
                             <?php echo $usuario; ?> </span>
								</a>
                
                        </li>
                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
                        </button>
                        
                   
            
            
                    
                        <?php if ($perfil == "admin"){ ?>
                     
     <li>
                                <a href="index.php?action=usuarios"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Usuarios</span></a>
                            </li>
                      
                            <li>
                                <a href="index.php?action=inventario" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Productos</span></a>
                            </li>
                       
                            <li>
                                <a href="index.php?action=categorias" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Categorias</span></a>
                            </li>
    
                            <li>
                                <a href="index.php?action=ventas" aria-expanded="false"><span class="fa fa-shopping-cart"></span> <span class="mini-click-non">POS</span></a>
                            </li>
    
                             
                            <li>

                           <?php }else{  ?>
                           <li>
                                <a href="index.php?action=ventas" aria-expanded="false"><span class="fa fa-shopping-cart"></span> <span class="mini-click-non">POS</span></a>
                            </li>
    
                                

                        <?php  } ?>
                    
                        
                         
				<li class="nav-item">
				<a href="index.php?action=salir" class="nav-link">
					<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Salir
						</p>
					</a>
				</li>


                        </li>
  
                    </ul>
                </nav>
            </div>
        </nav>
    </div>



    <script src="default/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="default/js/bootstrap.min.js"></script>
    <script src="default/js/wow.min.js"></script>
    <script src="default/js/jquery-price-slider.js"></script>
    <script src="default/js/jquery.meanmenu.js"></script>
    <script src="default/js/owl.carousel.min.js"></script>
    <script src="default/js/jquery.sticky.js"></script>
    <script src="default/js/jquery.scrollUp.min.js"></script>
    <script src="default/js/counterup/jquery.counterup.min.js"></script>
    <script src="default/js/counterup/waypoints.min.js"></script>
    <script src="default/js/counterup/counterup-active.js"></script>
    <script src="default/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="default/js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="default/js/metisMenu/metisMenu.min.js"></script>
    <script src="default/js/metisMenu/metisMenu-active.js"></script>
    <script src="default/js/morrisjs/raphael-min.js"></script>
    <script src="default/js/morrisjs/morris.js"></script>
    <script src="default/js/morrisjs/morris-active.js"></script>
    <script src="default/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="default/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="default/js/sparkline/sparkline-active.js"></script>
    <script src="default/js/calendar/moment.min.js"></script>
    <script src="default/js/calendar/fullcalendar.min.js"></script>
    <script src="default/js/calendar/fullcalendar-active.js"></script>
    <script src="default/js/plugins.js"></script>
    <script src="default/js/main.js"></script>
    <script src="default/js/tawk-chat.js"></script>
</body>



</html>





















<!-- 
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-wigdet="pushmenu" href="index.php?action=tablero"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
</nav>

<aside class="main-sidebar sidebar-dark-success elevation-4">
	<a href="index.php?action=tablero" class="brand-link nav-success">
		<img src="views/assets/dist/img/upv.png" alt="Inventarios | TAW | UPV" class="brand-image img-square" style="opacity: .8">
		<span class="brand-text font-weight-light">Inventarios 2020</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="views/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="index.php?action=tablero" class="d-block"> <?php /*Muestra el nombre del usuario actual if (isset($_SESSION['nombre_usuario'])) {
					echo $_SESSION['nombre_usuario']; } */ ?> </a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-colum" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
				<a href="index.php?action=tablero" class="nav-link">
					<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Tablero
						</p>
					</a>
				</li>

				<li class="nav-item">
				<a href="index.php?action=usuarios" class="nav-link">
					<i class="nav-icon fas fa-users"></i>
						<p>
							Usuarios
						</p>
					</a>
				</li>

				<li class="nav-item">
				<a href="index.php?action=inventario" class="nav-link">
					<i class="nav-icon fas fa-box"></i>
						<p>
							Productos
						</p>
					</a>
				</li>

				<li class="nav-item">
				<a href="index.php?action=categorias" class="nav-link">
					<i class="nav-icon fas fa-tag"></i>
						<p>
							Categorias
						</p>
					</a>
				</li>

		

				<li class="nav-item">
				<a href="index.php?action=salir" class="nav-link">
					<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Salir
						</p>
					</a>
				</li>

			</ul>
		</nav>
	</div>
</aside>   -->
