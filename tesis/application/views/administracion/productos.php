
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_producto');?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/insertar_producto', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_del')." ".$this->lang->line('msg_producto');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">
                    <?php echo $this->lang->line('msg_formula')." ".$this->lang->line('msg_para')." ".$this->lang->line('msg_el')." ".$this->lang->line('msg_producto');?></label>
               <div class="col-sm-2">
                    <?php
                    if ($formula != false) {
                        echo '<select class="form-control" name="formula" >';
                        foreach ($formula as $fila) {
                            echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo 'No existen Fórmulas en el Sistema';
                    }
                    ?> 
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
                <th ><?php echo $this->lang->line('msg_nombre_producto');?></th>
                <th ><?php echo $this->lang->line('msg_formula');?></th>
                <th ><?php echo $this->lang->line('msg_costo');?></th>
                <th ><?php echo $this->lang->line('msg_UM');?></th>                
                <th ><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>

                <tbody>                

                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->nombre ?></td>   
                                <td><?php echo $fila->formula ?></td>
                                <td><?php echo $fila->costo ?></td>
                                <td><?php echo $fila->unidad_medida ?></td>                                
                                <td>
                                    <a href="<?= base_url() ?>index.php/administracion/editar_producto/<?php echo $fila->id_producto ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administracion/eliminar_producto/<?php echo $fila->id_producto ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?>  

                <tbody>

            </table> 

        </div>
    </div>
</div>

