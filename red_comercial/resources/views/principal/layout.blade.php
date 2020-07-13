<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="favicon.ico">
        <title>Red comercial</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">


        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/main2.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">
        <link rel="stylesheet" href="plugins/animate-css/animate.css">
        <link rel="stylesheet" href="plugins/slider/slider.css">
        <link rel="stylesheet" href="plugins/slick/slick.css">
        <link rel="stylesheet" href="plugins/facncybox/jquery.fancybox.css">
        <link rel="stylesheet" href="plugins/hover/hover-min.css">
        <link rel="stylesheet" href="css/style.css">
        
    </head>


<body>


<div id="app">

    <!-- Header donde se encuentra (home, ingresar, registrarme) -->
    <header-component-principal></header-component-principal>

<div class="mapaYbuscador">
    <!-- Buscador lateral izquierdo en componente -->
    <buscador-component-principal></buscador-component-principal>

    <!-- Mapa estatico -->
    <div id="mapa">
        <iframe id="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58434.865182840294!2d-99.17835765748364!3d23.740992805908864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86795132d7b7f193%3A0x42b200757d7f08d6!2sCd%20Victoria%2C%20Tamps.!5e0!3m2!1ses!2smx!4v1594356008339!5m2!1ses!2smx" width="900" height="900" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

<!-- Se manda llamar contenido (index.blade.php) -->
     @yield('contenido') 
</div>

    <!-- Footer basico con logos en componente  -->
    <footer-component-principal></footer-component-principal> 


</div>


	<script src="plugins/jQurey/jquery.min.js"></script>	
	<script src="plugins/slider/slider.js"></script>
	<script src="plugins/jQurey/jquery.min.js"></script>
    <script src="plugins/form-validation/jquery.validate.min.js"></script>
	<script src="plugins/facncybox/jquery.fancybox.js"></script>
    <script src="js/main.js"></script>
    <script src="vendor/tilt/tilt.jquery.min.js"></script>


    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    
    <script src="js/app.js"></script>
    
 	</body>
</html>