
<!-- Contiene toda la navegación -->
<?php
  //  include("navegation.php");

?>
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>registro de estudiantes</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>telefono</th>
                    <th>password</th>
                    <th>editar / eliminar</th>
                </tr>
                
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['email']; ?></th>
                        <th><?php echo $data['telefono']; ?></th>
                        <th><?php echo $data['password']; ?></th>
                        <th>
                            <a href="index.php?m=user&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    
</div>




<!-- Contiene el footer -->
<?php
   // include("footer.php");  
?>
