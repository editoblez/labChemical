
<?php $this->load->view('headers/menu_venta') ?>

<div class="starter-template">   
    <p class="lead"><b>Crear Factura</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('ventas/generar_factura', $atributos) ?>

            <p class="lead"><b>Datos del Cliente</b></p>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre del Cliente</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="numero" placeholder="" value="<?php echo set_value('numero') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">R.U.C</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="numero" placeholder="" value="<?php echo set_value('numero') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Telefono </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="numero" placeholder="" value="<?php echo set_value('numero') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-4">
                    <textarea  class="form-control" name="descripcion" placeholder="descripcion"><?php echo set_value('descripcion') ?></textarea>
                </div>
            </div>

            <p class="lead"><b>Lista de Productos</b></p>

            <?php echo form_close() ?>

            <table class="table table-striped  table-bordered">
                <thead>                    
                <th >Cantidad</th>
                <th >Nombre del Producto</th>  
                <th >Precio Unit.</th>
                <th >Precio Total</th>
                <th >Acciones</th>
                </thead>

                <tbody>         
                    <tr>
                        <td><input type="text" class="form-control" name="numero" placeholder="" value=""></td>
                        <td>
                            <?php
                            if ($var != false) {
                                echo '<select class="form-control" name="producto" >';
                                foreach ($var as $fila) {
                                    echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                                }
                                echo '</select>';
                            } else {
                                echo 'No Existen Produtos';
                            }
                            ?>   
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="label label-primary">  <span class="glyphicon glyphicon-pencil"></span></a>  
                            &nbsp;
                            <a href="" class="label label-danger">  <span class="glyphicon glyphicon-remove"></span></a>  
                        </td>
                    </tr>

                <tbody>

            </table> 


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Generar Factura</button>
                </div>
            </div>      



        </div>
    </div>
</div>

