

<!-- Contiene toda la navegación -->
<?php
    // include("navegation.php");
?>
<div class="container">
    <div class="jumbotron">
        <h2>formulario registro</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?m=get_datosE" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosE&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>

                <div class="form-group">
                    <div class="col-sm-10">
                <input type="hidden" class="form-control" name="txt_id" value="<?php echo $data['id']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_email">EMAIL:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_email" value="<?php echo $data['email']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_tel">TELEFONO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_tel" value="<?php echo $data['telefono']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_pass">PASSWORD:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_pass" value="<?php echo $data['password']; ?>">
                    </div>
                    
                </div>
                
           
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="registrar">
                    <?php }  ?>
                    <?php if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>
<br>
<!-- Contiene el footer -->
<?php
    // include("footer.php");  
?>
