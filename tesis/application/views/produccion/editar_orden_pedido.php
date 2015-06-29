<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Datos de la Orden de Pedido </b></p>
    <h3><a href="<?= base_url() ?>index.php/produccion/ver_orden_pedido" >Atras</a></h3>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>
            
            <?php foreach ($datos_orden as $orden) { ?>
            
            <input type="hidden" name="id" value="<?php echo $orden->id_orden_pedido ?>"> 
            
            <table class="table table-striped  table-bordered" >
                <thead >               
                <th>Número de la Orden</th>
                <th>Fecha de la Orden</th> 
                <th>Acciones</th>
                </thead>
                <tbody>                
                <td><?php echo $orden->numero_orden ?></td> 
                <td>
                    <input type="date" class="form-control" id="idfecha" name="fecha"  value="<?php echo $orden->fecha ?>">
                </td>
                <td>
                    <a href="<?= base_url() ?>index.php/produccion/editar_datos_orden_pedido/<?php echo $orden->id_orden_pedido ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
                </tbody>
            
           
            <table class="table table-striped  table-bordered" >
                <thead >               
                <th >Materia Prima</th>           
                <th >Cantidad</th>
                <th>Acciones</th>
                </thead>

                <tbody>                
                    <?php if ($materiales_orden != false) { ?>
                        <?php foreach ($materiales_orden as $orden1) { ?>
                            <tr>                                     
                                <td><?php echo $orden1->nombre ?></td>
                                <td><?php echo $orden1->cantidad ?></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/produccion/editar_materiales_orden_pedido/<?php echo $orden1->id_materiales_orden_pedido ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/produccion/eliminar_materiales_orden_pedido/<?php echo $orden1->id_materiales_orden_pedido ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/produccion/agregar_materiales_orden_pedido/<?php echo $orden->id_orden_pedido ?> " class="label label-info"><span class="glyphicon glyphicon-plus"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <tbody>
            </table>  
                 <?php } ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

