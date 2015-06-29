
<?php $this->load->view('headers/menu_bodega_productos_quimicos') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_registrar')." ".$this->lang->line('msg_pedido');?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <!-- Se escribe el formulario-->
            <?php echo form_open('bodega_productos_quimicos/guadar_mat_prima', $atributos) ?>
            
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_materia_prima');?></label>
                <div class="col-sm-2">
                    <?php
                    if ($mat_prima != false) {
                        echo '<select class="form-control" name="mat_prima" >';
                        foreach ($mat_prima as $fila) {
                            echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
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
                    <input type="text" class="form-control" name="cantidad" placeholder="" value="<?php echo set_value('cantidad') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_costo')." ".$this->lang->line('msg_por')." ".$this->lang->line('msg_unidad');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="costo" placeholder="" value="<?php echo set_value('costo') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_id')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_solicitud');?>ID de la Solicitud</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="id_solicitud" placeholder="" value="<?php echo set_value('id_solicitud') ?>">
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('msg_save');?></button>
                </div>
            </div>      
            
            <!-- Comienza  la tabla dinámica-->
            <table class="table table-striped  table-bordered">
                <thead>
                    <th ><?php echo $this->lang->line('msg_id')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_solicitud');?></th>
                    <th ><?php echo $this->lang->line('msg_ver')." ".$this->lang->line('msg_pedido');?></th>
                    
<!--                 <th >Nombre Materia Prima</th>                
                <th >Cantidad</th>
                <th >Costo por Unidad</th>
                
                <th >Acciones</th> 
                -->
                </thead>

                <tbody>                

                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                  <td><?php echo $fila->numero_solicitud ?></td>
                                  <td><a href="<?= base_url() ?>bodega_productos_quimicos/ver_datos_pedido/<?php echo $fila->numero_solicitud ?>" class="label label-primary">Ver</a>
                                  &nbsp;
                                  <a href="<?= base_url() ?>bodega_productos_quimicos/eliminar_pedido/<?php echo $fila->numero_solicitud ?>" class="label label-primary">Eliminar</a></td>
                                
                                
                            </tr>
                        <?php } ?>  
                    <?php } ?>  

                </tbody>

            </table> 


        </div>
    </div>
</div>

