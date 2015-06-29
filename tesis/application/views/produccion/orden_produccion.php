<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Registrar Orden de Producción </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-18">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">No. de Orden: </label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="idnumero" name="numero"  value="">
                </div>           

                <label for="inputEmail3" class="col-sm-4 control-label">Fecha de la Orden:  </label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="idfecha" name="fecha"  value="">
                </div>
            </div>    

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Responsable:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="idresponsable" name="responsable"  value="">
                </div>          



            </div>    


            <table class="table table-striped  table-bordered">
                <thead>
                <th >Nombre del Productos</th>           
                <th >Cantidad</th>
                <th>Costo</th>               
                <th>Fórmula</th>

                </thead>

                <tbody>   

                    <tr>          
                        <td>
                            <?php
                            if ($productos != false) {
                                echo '<select class="form-control" name="producto" id="idproducto" onchange="completar_orden_produccion(this)">';
                                foreach ($productos as $fila) {
                                    echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                                }
                                echo '</select>';
                            } else {
                                echo 'No existen Productos en el Sistema';
                            }
                            ?>   
                        </td>
                        <td>
                            <input type="text" class="form-control" id="idcantidad" name="cantidad" placeholder="" value="">
                        </td>
                        <td>
                           <?php
                            if ($productos != false) {
                                echo '<select class="form-control" id="idcosto" name="costo" onchange="completar_orden_produccion(this)">';
                                foreach ($productos as $fila) {
                                    echo '<option value="' . $fila->costo . '">' . $fila->costo . '</option>';
                                }
                                echo '</select>';
                            } 
                            ?>  
                        </td>

                        <td>
                            <?php
                            if ($productos != false) {
                                echo '<select class="form-control" id="idformula" name="formula" onchange="completar_orden_produccion(this)">';
                                foreach ($productos as $fila) {
                                    echo '<option value="' . $fila->formula . '">' . $fila->formula . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>   
                        </td>
                    </tr>

                <tbody>

            </table> 

            <?php echo form_close(); ?>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-14">
                    <button type="button" class="btn btn-primary" name=""  onclick="ordenProduccion()" >Agregar Productos</button>               
                    &nbsp;                
                    <button type="button" class="btn btn-primary" name=""  onclick="enviar_ordenProduccion()" >Registrar Orden de Produccion</button>
                </div>
            </div>



            <div class="starter-template">   
                <h4><b>Lista de Materia Prima de la Orden</b></h4>
            </div>
            <form id="id_orden_produccion" action="guardar_orden_produccion" name="orden_pedido" method="post">
                <input type="hidden" id="id_producto" name="producto" value="1"/>
                <input type="hidden" id="id_cantidad" name="cantidad" value="2"/>
                <input type="hidden" id="id_costo" name="costo" value="1"/>
                <input type="hidden" id="id_formula" name="formula" value="1"/>
                <input type="hidden" id="id_numero" name="numero" value="1"/>
                <input type="hidden" id="id_fecha" name="fecha" value="1"/>
                <input type="hidden" id="id_responsable" name="responsable" value="1"/>
                <input type="hidden" id="id_estado" name="estado" value="1"/>
            </form>
            <table class="table table-striped  table-bordered" id="ingredientes_orden_produccion" >
                <thead>
                <th>Producto</th>   
                <th>Cantidad</th>  
                <th>Costo</th>  
                <th>Formula</th>  
                </thead>
            </table>
              
        </div>
    </div>
</div>

