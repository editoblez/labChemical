
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_editar')." ".$this->lang->line('msg_user');?></b></p>
    <h3><a href="<?= base_url() ?>index.php/administracion/mostrar_usuario"><?php echo $this->lang->line('msg_atras');?></a></h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/actualizar_usuario', $atributos) ?>       


            <input type="hidden" name="id" value="<?php echo $id ?>">    

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_user');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="user" placeholder="usuario" value="<?php echo set_value('user') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_rol');?></label>
                <div class="col-sm-3">
                    <select class="form-control" name="rol"> 
                        <?php
                        if ($rol != false) {
                            echo '<option>' . $rol . '</option>';
                        } else {
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
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('msg_editar');?></button>
                </div>
            </div>      



        </div>
    </div>
</div>

