<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>registro de universidades</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>acción</th>
                </tr>
                
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th>
                            <a href="index.php?m=universidad&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDeleteUniversidad&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    
</div>