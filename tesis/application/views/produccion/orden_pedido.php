<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Registrar Orden de Pedido </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('produccion/guardar_orden_pedido', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">No. de Orden: </label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="idnumero" name="numero"  value="">
                    <label class="alert-danger "><?php echo validation_errors() ?> </label>
                </div>           

                <label for="inputEmail3" class="col-sm-4 control-label">Fecha de la Orden:  </label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="idfecha" name="fecha"  value="">
                </div>
            </div>    


            
            <table class="table table-striped  table-bordered">
                <thead>
                <th >Materia Prima</th>           
                <th >Cantidad</th>
                </thead>
                <tbody>  
                    <tr>          
                        <td>
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
                        </td>
                        <td>
                            <input type="text" class="form-control" name="cantidad" id="cantidad_op"  value="">
                        </td>                        
                    </tr>
                </tbody>
            </table> 
            
             <?php echo form_close(); ?>
            
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-14">
                    <button type="button" class="btn btn-primary" name=""  onclick="ordenPedido()" >Agregar Materia Prima</button>               
                &nbsp;                
                    <button type="button" class="btn btn-primary" name=""  onclick="enviar_ordenPedido()" >Registrar Orden de Pedido</button>
                </div>
            </div>
           
            <div class="starter-template">   
            <h4><b>Ingredientes de la Fórmula</b></h4>
            </div>
            
            <form id="id_orden_pedido" action="guardar_orden_pedido" name="orden_pedido" method="post">
                <input type="hidden" id="id_nombre" name="nombre" value=""/>
                <input type="hidden" id="id_cantidad" name="cantidad" value=""/>
                <input type="hidden" id="id_numero" name="numero" value=""/>
                <input type="hidden" id="id_fecha" name="fecha" value=""/>
            </form>
            <table class="table table-striped  table-bordered" id="ingredientes_orden_pedido" >
                <thead>
                <th>Materia Prima</th>   
                <th >Cantidad</th>  
                </thead>
            </table>
              
        </div>
    </div>
</div>

