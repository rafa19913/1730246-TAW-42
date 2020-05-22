

<!-- Contiene toda la navegación -->
<?php
    include("navegation.php");
?>


<div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Lista de usuarios</h4>
                            <div class="add-product">
                                <a href="add-user.php">Agregar usuario</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Contraseña</th>
                                        <th>Editar / Eliminar</th>
                                  
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

                <!-- <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                      -->

                                 
                                </table>
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Contiene el footer -->
<?php
    include("footer.php");  
?>
