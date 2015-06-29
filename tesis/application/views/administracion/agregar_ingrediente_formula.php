
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_ingredientes')." ".$this->lang->line('msg_a_la')." ".$this->lang->line('msg_formula');?></b></p>
    <h3><a href="<?= base_url() ?>index.php/administracion/formula" ><?php echo $this->lang->line('msg_atras');?></a></h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

             

           <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/insertar_ingrediente_formula', $atributos) ?>
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label" ><?php echo $this->lang->line('msg_materia_prima');?></label>
                <div class="col-sm-2">
                    <?php
                    if ($mat_prima != false) {
                        echo '<select class="form-control" name="mat_prima" id="mat_prima">';
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
                    <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="cantidad" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>      

            
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('msg_save');?></button>
                </div>
            </div>    
           
            
            <?php echo form_close(); ?>
          </div>
    </div>
</div>

