
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_editar')." ".$this->lang->line('msg_producto');?></b></p>
    <h3><a href="<?= base_url() ?>index.php/administracion/mostrar_usuario"><?php echo $this->lang->line('msg_atras');?></a></h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/actualizar_producto', $atributos) ?>
           
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_del')." ".$this->lang->line('msg_producto');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_formula')." ".$this->lang->line('msg_para')." ".$this->lang->line('msg_el')." ".$this->lang->line('msg_producto');?></label>
                <div class="col-sm-2">
                    <select class="form-control" name="Rol"> 
                        <option value="">Seleccione</option>
                        <option value="1">Nombre F1</option>
                        <option value="2">Nombre F2</option>
                        <option value="3">Nombre F3</option>

                    </select>
                </div>
            </div>    

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_unidad_medida');?></label>
                <div class="col-sm-2">
                    <select class="form-control" name="unidad_medida"> 
                        <?php
                        if ($um != false) {
                            echo '<option>' . $um . '</option>';
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
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('msg_editar');?></button>
                </div>
            </div>      

           
        </div>
    </div>
</div>

