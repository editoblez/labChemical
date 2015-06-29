
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b>Editar Usuarios</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administraccion/actualizar_usuario', $atributos) ?>  

            <?php foreach ($var as $fila) {  ?>
            
            <input type="hidden" name="id" value="<?php echo $fila->id_usuario ?>">    

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="user" placeholder="usuario" value="<?php echo $fila->user ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Rol</label>
                <div class="col-sm-3">
                    <select class="form-control" name="rol"> 
                        <option><?php echo $fila->rol ?></option>               
                        <option value="Administrador">Administrador</option>
                        <option value="Almacenero">Almacenero</option>
                        <option value="Jefe_produccion">Jefe_produccion</option>
                        <option value="Vendedor">Vendedor</option>    
                        <option value="Aprobador">Aprobador</option>    
                    </select>
                </div>
            </div>  

            <?php } ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>      



        </div>
    </div>
</div>

