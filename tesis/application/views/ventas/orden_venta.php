<?php $this->load->view('headers/menu_venta') ?>

<div class="starter-template">   
    <p class="lead"><b>Crear Orden de Venta </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">No. de Orden: </label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="idnumero" name="numero"  value="">
                </div>           

                <label for="inputEmail3" class="col-sm-4 control-label">Fecha de la Orden:  </label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="idfecha" name="fecha"  value="">
                </div>
            </div>  

           

            <table class="table table-striped  table-bordered">
                <thead>
                <th >Materiales</th>           
                <th >Cantidad</th>
                <th >Costo</th>               
                </thead>

                <tbody>                

                    <tr>          
                        <td>
                            <?php
                            if ($var != false) {
                                echo '<select class="form-control" id="idproducto" name="producto" onchange="completar_orden_venta()">';
                                foreach ($var as $fila) {
                                    echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                                }
                                echo '</select>';
                            } else {
                                echo 'No Existen Productos';
                            }
                            ?>   
                        </td>
                        <td>
                            <input type="text" class="form-control" id="idcantidad" name="cantidad" placeholder="" value="">
                        </td>
                        <td>
                             <?php
                            if ($var != false) {
                                echo '<select class="form-control" id="idcosto" name="costo" >';
                                foreach ($var as $fila) {
                                    echo '<option value="' . $fila->costo . '">' . $fila->costo . '</option>';
                                }
                                echo '</select>';
                            } 
                            ?>   
                        </td>                        
                    </tr>

                <tbody>

            </table> 

             <?php echo form_close() ?>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-14">
                    <button type="button" class="btn btn-primary" name=""  onclick="ordenVenta()" >Agregar Producto</button>               
                &nbsp;                
                    <button type="button" class="btn btn-primary" name=""  onclick="enviar_ordenVenta()" >Registrar Orden de Venta</button>
                </div>
            </div>
            
            <div class="starter-template">   
            <h4><b>Materiales de la Orden</b></h4>
            </div>
            
            <form id="id_orden_venta" action="guardar_orden_venta" name="orden_venta" method="post">
                <input type="hidden" id="id_producto" name="producto" value="1"/>
                <input type="hidden" id="id_cantidad" name="cantidad" value="2"/>
                <input type="hidden" id="id_costo" name="costo" value="2"/>
                <input type="hidden" id="id_numero" name="numero" value="1"/>
                <input type="hidden" id="id_fecha" name="fecha" value="1"/>
            </form>
            <table class="table table-striped  table-bordered" id="ingredientes_orden_venta" >
                <thead>
                <th>Productos</th>   
                <th>Cantidad</th>  
                <th>Costo</th>  
                </thead>
            </table>

        </div>
    </div>
</div>

