<?php
//Verifica que exista una sesion iniciada 
	if($_GET['action']=='salir'){
		header('location:index.php?action=ingresar');
	}
?>
<!--Navbar-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-wigdet="pushmenu" href="index.php?action=tablero"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
</nav>
<!--/.navbar-->

<!--Main Sidebar Container-->
<aside class="main-sidebar sidebar-dark-success elevation-4">
	<!--Brand Logo-->
	<a href="index.php?action=tablero" class="brand-link nav-success">
		<img src="views/assets/dist/img/UPV.png" alt="Inventarios | TAW | UPV" class="brand-image img-square" style="opacity: .8">
		<span class="brand-text font-weight-light">Inventarios 2020</span>
	</a>
<!--Sidebar-->
	<div class="sidebar">
		<!--Sidebar user panel (optional)-->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="views/assets/dist/img/user2-160x60.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="index.php?action=tablero" class="d-block"> <?php /*Muestra el nombre del usuario actual*/ if (isset($_SESSION['nombre_usuario'])) {
					echo $_SESSION['nombre_usuario']; }?> </a>
			</div>
		</div>
<!--Sidebar Menu-->
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
		<!--/.sidebar menu-->
	</div>
	<!--/.sidebar-->
</aside>


