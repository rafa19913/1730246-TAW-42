


<?php 
    require_once('models/user-model.php');

    class user_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new user_model();
        }

        function index(){
            $query =$this->model_e->get();
            include_once('views/navegation.php');
            include_once('views/index.php');
            include_once('views/footer.php');
          
        }


        function user(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('views/navegation.php');
            include_once('views/add-user.php'); // FORMULARIO REGISTRO
            include_once('views/footer.php');
        }

        function get_datosE(){
            $data['id']=$_REQUEST['txt_id'];
            $data['email']=$_REQUEST['txt_email'];
            $data['telefono']=$_REQUEST['txt_tel'];
            $data['password']=$_REQUEST['txt_pass'];

            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php");

        }

        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('views/navegation.php');
            include_once('views/confirm.php');
            include_once('views/footer.php');
            


        }


    }
?>