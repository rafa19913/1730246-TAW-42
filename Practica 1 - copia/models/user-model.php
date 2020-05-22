<?php
    
    /**
     * Modelo de USUARIO (CRUD)
     */

    class user_model{
        private $DB;
        private $users;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM usuarios ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->users=$fila;
            return $this->users;
        }

        function create($data){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO usuarios(id,email,telefono,password)VALUES (?,?,?,?)";
            $query = $this->DB->prepare($sql);
            $query->execute(array($data['id'],$data['email'],$data['telefono'],$data['password']));
            Database::disconnect();       

        }
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuarios where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuarios set email=?, telefono=?, password=? WHERE id=?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['email'],$data['telefono'],$data['password'], $date));
            Database::disconnect();

        }

        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM usuarios where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

