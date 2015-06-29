<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Editar Materiales de la Orden de Pedido </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('produccion/actualizar_materiales_orden_pedido', $atributos) ?>

            <?php foreach ($materiales as $material) { ?>

                <input type="hidden" name="id" value="<?php echo $material->id_materiales_orden_pedido ?>">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label" >Materia Prima </label>
                    <div class="col-sm-2">
                        <?php
                        if ($mat_prima != false) {
                            echo '<select class="form-control" name="materia_prima" >';
                            foreach ($mat_prima as $filas) {
                                if ($material->nombre == $filas->nombre) {
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
                    <label for="inputEmail3" class="col-sm-3 control-label">Cantidad:  </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="idcantidad" name="cantidad"  value="<?php echo $material->cantidad ?>">
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-12">
                    <button type="submit" class="btn btn-primary">Editar</button>               
                </div>
            </div>            

            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

