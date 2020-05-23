
<?php

    function compararSeccionSeleccionada(){
        global $ruta;
        $ruta = $_REQUEST['m'];
        settype($ruta,'string'); // Se convierte en string para hacer comparaciones de rutas
        
        
        if (regresaTrueSiEsRutaEstudiante()){ // acciones en la parte del estudiante
            crearControladorDeEstudiante();

        }else if (regresaTrueSiEsRutaUniversidad()){ // acciones en la parte de universidad
            crearControladorDeUniversidad();

        }else if (regresaTrueSiEsRutaCarreras()){ // acciones en la parte de carreras
            crearControladorDeCarreras();

        }
    }




    /**
     * Si regresa true significa que accedió a una pestaña del estudiante (nuevo estudiante, listar estudiante, eliminar estudiante...)
     */
    function regresaTrueSiEsRutaEstudiante(){
        global $ruta;
        if ($ruta == "vestudiante" || $ruta == "estudiante" || $ruta == "confirmarDeleteEstudiante" || $ruta == "get_datosE" ){
            return true;
        }
        return false;
    }

    /**
     * Si regresa true significa que accedió a una pestaña de las carreras (nueva carrera, listar carreras, eliminar carrera...)
     */
    function regresaTrueSiEsRutaCarreras(){
        global $ruta;
        if ($ruta == "vcarrera" || $ruta == "carrera" || $ruta == "confirmarDeleteCarrera" || $ruta == "get_datosC"){
            return true;
        }
        return false;
    }

    /**
     * Si regresa true significa que accedió a una pestaña de universidad (nueva universidad, listar univesridades, eliminar...)
     */
    function regresaTrueSiEsRutaUniversidad(){
        global $ruta;
        if ($ruta == "vuniversidad" || $ruta == "universidad" || $ruta == "confirmarDeleteUniversidad" || $ruta == "get_datosU" ){
            return true;
        }
        return false;
    }

    /**
     * Se hacen las validaciones correspondientes para crear 
     * el objeto estudiante_controller y saber a que ruta se dirigé (agregar) (editar) (eliminar) (listar)
     */
    function crearControladorDeEstudiante(){
        global $ruta;
        global $controlador;
        $controlador = new estudiante_controller();

        switch ($ruta) {
            case 'vestudiante':
                $controlador -> index();
                break;
            case 'estudiante':
                $controlador -> estudiante();
                break;
            case 'get_datosE':
                $controlador -> get_datosE();
                break;
            case 'confirmarDeleteEstudiante':
                $controlador -> confirmarDelete();  
                break;
            
            default:
                break;
        }

    }


    /**
     * Se hacen las validaciones correspondientes para crear 
     * el objeto estudiante_controller y saber a que ruta se dirigé (agregar) (editar) (eliminar) (listar)
     */
    function crearControladorDeCarreras(){
        global $ruta;
        global $controlador;
        $controlador = new carrera_controller();

        switch ($ruta) {
            case 'vcarrera':
                $controlador -> index();
                break;
            case 'carrera':
                $controlador -> carrera();
                break;
            case 'get_datosC':
                $controlador -> get_datosC();
                break;
            case 'confirmarDeleteCarrera':
                $controlador -> confirmarDelete();  
                break;
            
            default:
                break;
        }

    }

    
    /**
     * Se hacen las validaciones correspondientes para crear 
     * el objeto universidad_controller y saber a que ruta se dirigé (agregar) (editar) (eliminar) (listar)
     */
    function crearControladorDeUniversidad(){
        global $ruta;
        global $controlador;
        $controlador = new universidad_controller();

        switch ($ruta) {
            case 'vuniversidad':
                $controlador -> index();
                break;
            case 'universidad':
                $controlador -> universidad();
                break;
            case 'get_datosU':
                $controlador -> get_datosU();
                break;
            case 'confirmarDeleteUniversidad':
                $controlador -> confirmarDelete();  
                break;
            default:
                break;
        }

    }

?>

