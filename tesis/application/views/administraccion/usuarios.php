
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b>Agregar Usuarios</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     
          
            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administraccion/insertar_usuario', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="user" placeholder="usuario" value="<?php echo set_value('user') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="contraseña" placeholder="contraseña" value="">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Rol</label>
                <div class="col-sm-3">
                    <select class="form-control" name="rol"> 
                        <?php if ($var1 != false) {        
                           echo '<option>'. $var1 .'</option>';                           
                         }
                         else
                         {
                            echo' <option value="">Seleccione</option>';
                         }
                         ?>                             
                        <option value="Administrador">Administrador</option>
                        <option value="Almacenero">Almacenero</option>
                        <option value="Jefe_produccion">Jefe_produccion</option>
                        <option value="Vendedor">Vendedor</option>    
                        <option value="Aprobador">Aprobador</option>    
                    </select>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>      

            <?php echo form_close() ?>


            <table class="table table-striped  table-bordered">
                <thead>
                <th >Usuario</th>
                <th >Rol</th>
                <th >Acciones</th>
                </thead>

                <tbody>                
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->user ?></td>                                
                                <td><?php echo $fila->rol ?></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/administraccion/editar_usuario/<?php echo $fila->id_usuario ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administraccion/eliminar_usuario/<?php echo $fila->id_usuario ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?>  
                <tbody>

            </table> 

        </div>
    </div>
</div>

