
<?php $this->load->view('headers/menu_bodega_productos_quimicos') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_editar')." ".$this->lang->line('msg_materia_prima');?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('bodega_productos_quimicos/actualizar_mat_prima', $atributos) ?>



            <input type="hidden" name="id" value="<?php echo set_value('id') ?>">    

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_pedido');?>Nombre de la Materia Prima</label>
                <div class="col-sm-2">
                    <?php
                    if ($mat_prima != false) {
                        echo '<select class="form-control" name="mat_prima" >';
                        foreach ($mat_prima as $filas) {
                            if ($nombre == $filas->nombre) {
                                echo '<option value="' . $filas->nombre . '" selected="selected">' . $filas->nombre . '</option>';
                            } else {
                                echo '<option value="' . $filas->nombre . '" >' . $filas->nombre . '</option>';
                            }
                        }
                        echo '</select>';
                    }
                    ?>  
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cantidad"  value="<?php echo set_value('cantidad') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Costo</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="costo"  value="<?php echo set_value('costo') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">ID de la Solicitud</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="numero_solicitud"  value="<?php echo set_value('numero_solicitud') ?>">
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>      
        </div>
    </div>
</div>

