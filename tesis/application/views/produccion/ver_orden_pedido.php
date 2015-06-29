<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Lista de Ordenes de Pedido </b></p>
    <h4><a href="<?= base_url() ?>index.php/produccion/orden_pedido" >Registrar orden de Pedido</a></h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>
           
            <table class="table table-striped  table-bordered">
                <thead>
                <th >No. de Orden </th>
                <th >Fecha </th>
                <th >Ingrediente</th>
                <th >Acciones</th>
                </thead>

                <tbody>                
                      <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->numero_orden ?></td> 
                                <td><?php echo $fila->fecha ?></td> 
                                <td><a href="<?= base_url() ?>index.php/produccion/ver_materiales_orden_pedido/<?php echo $fila->numero_orden ?>" class="label label-primary">Ver</a></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/produccion/editar_orden_pedido/<?php echo $fila->id_orden_pedido ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/produccion/eliminar_orden_pedido/<?php echo $fila->numero_orden ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?> 
                </tbody>

            </table>    
        </div>
    </div>
</div>

