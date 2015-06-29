
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_agregar'). " ".$this->lang->line('msg_user');?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     
          
            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/insertar_usuario', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_user');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="user" placeholder="usuario" value="<?php echo set_value('user') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_password');?></label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="contraseña" placeholder="contraseña" value="">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_rol');?></label>
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
                        <option value="Administrador"><?php echo $this->lang->line('msg_administrador');?></option>
                        <option value="Almacenero"><?php echo $this->lang->line('msg_almacenero');?></option>
                        <option value="Jefe_produccion"><?php echo $this->lang->line('msg_jefe_produccion');?></option>
                        <option value="Vendedor"><?php echo $this->lang->line('msg_vendedor');?></option>    
                        <option value="Aprobador"><?php echo $this->lang->line('msg_aprobador');?></option>    
                    </select>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('msg_save');?></button>
                </div>
            </div>      

            <?php echo form_close() ?>


            <table class="table table-striped  table-bordered">
                <thead>
                <th ><?php echo $this->lang->line('msg_user');?></th>
                <th ><?php echo $this->lang->line('msg_rol');?></th>
                <th ><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>

                <tbody>                
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->nombre_usuario ?></td>                                
                                <td><?php echo $fila->rol ?></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/administracion/editar_usuario/<?php echo $fila->idusuario ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administracion/eliminar_usuario/<?php echo $fila->idusuario ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?>  
                <tbody>

            </table> 

        </div>
    </div>
</div>

