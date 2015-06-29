
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b>Agregar Producto</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administraccion/insertar_producto', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre del Producto</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Formula para el Producto</label>
               
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Costo</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="costo" placeholder="costo" value="<?php echo set_value('costo') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Unidad de Medida</label>
                <div class="col-sm-2">
                    <select class="form-control" name="unidad_medida"> 
                        <?php
                        if ($var1 != false) {
                            echo '<option>' . $var1 . '</option>';
                        } else {
                            '<option value="">Seleccione</option>';
                        }
                        ?>    
                        <option value="Kg">Kg</option>
                        <option value="Litros">Litros</option>
                        <option value="Metros">Metros</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>      

            <?php echo form_close() ?>

            <table class="table table-striped  table-bordered">
                <thead>
                <th >Nombre del Producto</th>
                <th >Formula</th>
                <th >Costo</th>
                <th >UM</th>
                <th >Acciones</th>
                </thead>

                <tbody>                

                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->nombre ?></td>   
                                <td></td>
                                <td><?php echo $fila->costo ?></td>
                                <td><?php echo $fila->unidad_medida ?></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/administraccion/editar_producto/<?php echo $fila->id_producto ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administraccion/eliminar_producto/<?php echo $fila->id_producto ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?>  

                <tbody>

            </table> 

        </div>
    </div>
</div>

