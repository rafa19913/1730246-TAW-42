

<?php
    session_start();
    $usuario = $_SESSION['user'];

    if ($usuario != 'admin'){
        header("Location:login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?m=estudiante">Nuevo usuario</a></li>
            <li class="active"><a href="index.php?m=carrera">Nueva carrera</a></li>
            <li class="active"><a href="index.php?m=universidad">Nueva Universidad</a></li>
              <li class="dropdown">

         
              <a href="index.php?m=vestudiante" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
              <a href="index.php?m=vcarrera" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carreras <span class="caret"></span></a>
              <a href="index.php?m=vuniversidad" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Universidades <span class="caret"></span></a>
              </li>
            </ul>

            <a href="salir.php">Cerrar sesión</a>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>