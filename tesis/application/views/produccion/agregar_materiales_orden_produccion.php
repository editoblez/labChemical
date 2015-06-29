<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Agregar Materiales a la Orden de Produccion </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('produccion/insertar_materiales_orden_produccion', $atributos) ?>

            <input type="hidden" name="id" value="<?php echo $id ?>">
           <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label" >Producto </label>
                    <div class="col-sm-2">
                        <?php
                            if ($productos != false) {
                                echo '<select class="form-control" name="producto" id="idproducto" onchange="completar_orden_produccion()">';
                                foreach ($productos as $fila) {
                                    echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                                }
                                echo '</select>';
                            } else {
                                echo 'No existen Productos en el Sistema';
                            }
                            ?>                         
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Cantidad:  </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="idcantidad" name="cantidad"  value="<?php echo set_value('cantidad') ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label" >Costo </label>
                    <div class="col-sm-2">
                         <?php
                            if ($productos != false) {
                                echo '<select class="form-control" id="idcosto" name="costo" >';
                                foreach ($productos as $fila) {
                                    echo '<option value="' . $fila->costo . '">' . $fila->costo . '</option>';
                                }
                                echo '</select>';
                            } 
                            ?>                         
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label" >Formula </label>
                    <div class="col-sm-2">
                        <?php
                            if ($productos != false) {
                                echo '<select class="form-control" id="idformula" name="formula" >';
                                foreach ($productos as $fila) {
                                    echo '<option value="' . $fila->formula . '">' . $fila->formula . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>                      
                    </div>
                </div>
            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-12">
                    <button type="submit" class="btn btn-primary">Agregar</button>               
                </div>
            </div>   

            <?php echo form_close(); ?>

        </div>
    </div>
</div>

