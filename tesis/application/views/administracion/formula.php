
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_formula');?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     
            <?php $atributos = array('class' => 'form-horizontal', "id" => 'idFormula') ?>
            <?php echo form_open('administracion/insertar_formula', $atributos) ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="idNom_formula" name="nombre_formula" placeholder="nombre" value="<?php echo set_value('nombre_formula') ?>">
                    <?php echo form_error('nombre_formula', '<p class="alert-danger">', '</p>');?>
                </div>
            </div>  
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label" ><?php echo $this->lang->line('msg_materia_prima');?> </label>
                <div class="col-sm-2">
                    <?php
                    if ($mat_prima != false) {
                        echo '<select class="form-control" name="mat_prima" id="idMat_prima">';
                        foreach ($mat_prima as $fila) {
                            echo '<option value="' . $fila->nombre_materia_prima . '">' . $fila->nombre_materia_prima . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo 'No existen Materias Primas en el Sistema';
                    }
                    ?> 
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_cantidad');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cantidad" id="idCantidad" placeholder="cantidad" value="<?php echo set_value('cantidad') ?>">
                    <?php echo form_error('cantidad', '<p class="alert-danger">', '</p>');?>
                </div>
            </div>      

            <?php echo form_close(); ?>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-primary" name="formula"  onclick="formula()" ><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_ingredientes');?></button>                   
                    &nbsp;
                    <button type="button" class="btn btn-primary" name="formula"  onclick="enviar_formula()" ><?php echo $this->lang->line('msg_save')." ".$this->lang->line('msg_formula');?> </btton>
                </div>
            </div>     
           
            <div class="starter-template">   
            <h4><b><?php echo $this->lang->line('msg_ingredientes')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?></b></h4>
            </div>
            
            <table class="table table-striped  table-bordered" id="ingredientes" >
               <thead>
                <th><?php echo $this->lang->line('msg_name');?></th>   
                <th><?php echo $this->lang->line('msg_cantidad');?></th>  
                </thead>
            </table>
            <table class="table table-striped  table-bordered">
                <thead>
                <th ><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?></th>
                <th ><?php echo $this->lang->line('msg_ingredientes');?></th>
                             
                <th ><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>

                <tbody> 
                   <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->nombre_formula ?></td>   
                                <td><a href="<?= base_url() ?>index.php/administracion/ver_materiales_formula/<?php echo $fila->nombre_formula ?>" class="label label-primary">Ver</a></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/administracion/editar_formula/<?php echo $fila->idformula ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administracion/eliminar_formula/<?php echo $fila->idformula ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?> 
                <tbody>
            </table> 
            
          </div>
    </div>
</div>

