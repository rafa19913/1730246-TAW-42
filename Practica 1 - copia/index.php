<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
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

<?php


    require_once('database/connection.php');
    require_once('controllers/user-controller.php');

    $controller= new user_controller();

    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->index();
        }
    }else{
        $controller->index();
    }




?>


<body>

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