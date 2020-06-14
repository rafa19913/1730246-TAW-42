<?php
//Cierra la sesion actual y limpia la informacion asociada a la misma
	header("location:index.php?action=ingresar");
	session_destroy();
	ob_end_flush();

		
	
	?>