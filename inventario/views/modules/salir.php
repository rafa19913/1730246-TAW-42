<?php
//Cierra la sesion actual y limpia la informacion asociada a la misma
	session_destroy();
	ob_end_flush();
?>