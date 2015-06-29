<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Registrar Orden de Pedido </b></p>    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('produccion/editar_orden_pedido', $atributos) ?>

            

            <table class="table table-striped  table-bordered" width="30%">
                <thead >               
                <th >No. de Orden</th>           
                <th >Fecha</th>
                <th >Estado</th>
                <th >Lista de Materiales</th>
                <th >Acciones</th>
                </thead>

                <tbody>                
                   <?php if($var !=false){ ?>
                    <?php foreach ($var as $fila) { ?>
                    <tr>                                     
                        <td><input type="hidden" value="<?php echo $fila->numero_orden ?>" name="numero_orden"><?php echo $fila->numero_orden ?></td>
                        <td><?php echo $fila->fecha ?></td>
                        <td>
                            <select  class="form-control" name="estado">
                                <option value="solicitada" selected="selected">Solicitada</option>
                                <option value="aprobada">Aprobada</option>
                            </select>
                        </td>
                        <td>
                           <a href="<?= base_url() ?>index.php/produccion/ver_materiales_orden_pedido/<?php echo $fila->id_orden_pedido ?>" class="label label-primary">Ver</a>
                        </td>
                        <td>
                           <a href="<?= base_url() ?>index.php/produccion/verificar_orden_pedido/<?php echo $fila->id_orden_pedido ?>" class="label label-primary">Verificar</span></a>
                           &nbsp;
                          <a href="<?= base_url() ?>index.php/produccion/editar_orden_pedido/<?php echo $fila->id_orden_pedido ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                     <?php } ?>
                <tbody>

            </table>             
             <?php echo form_close() ?>
        </div>
    </div>
</div>

