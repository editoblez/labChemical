
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_materia_prima') ;?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/insertar_mat_prima', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_material');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_unidad_medida');?></label>
                <div class="col-sm-2">
                    <select class="form-control" name="unidad_medida"> 
                        <?php
                        if ($var1 != false) {
                            echo '<option>' . $var1 . '</option>';
                        } else {
                            echo '<option value="">Seleccione</option>';
                        }
                        ?>                         
                        <option value="Kg"><?php echo $this->lang->line('msg_kg');?></option>
                        <option value="Litros"><?php echo $this->lang->line('msg_litro');?></option>
                        <option value="Metros"><?php echo $this->lang->line('msg_metro');?></option>
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
                <th ><?php echo $this->lang->line('msg_nombre');?></th>
                <th ><?php echo $this->lang->line('msg_unidad_medida');?></th>                
                 <th ><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>

                <tbody>                
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->nombre_materia_prima ?></td>                                
                                <td><?php echo $fila->unidad_medida ?></td>                              
                                <td>
                                    <a href="<?= base_url() ?>index.php/administracion/editar_mat_prima/<?php echo $fila->idmateria_prima ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administracion/eliminar_mat_prima/<?php echo $fila->idmateria_prima ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?>  
                <tbody>

            </table> 

        </div>
    </div>
</div>

