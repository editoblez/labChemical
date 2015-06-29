<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b>Datos del pedido </b></p>
    <h3><a href="<?= base_url() ?>bodega_productos_quimicos/agregar_mat_prima" >Atras</a></h3>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>



            <table class="table table-striped  table-bordered" width="30%">
                <thead >               
                <th >Nombre de Materia Prima</th>           
                <th >Cantidad</th>
                <th >Costo </th>
                <th >Acciones</th>

                </thead>

                <tbody>                
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>
                                <td><?php echo $fila->nom_mat_prima ?></td>
                                <td><?php echo $fila->cantidad ?></td>
                                <td><?php echo $fila->costo  ?></td>
                                
                                <td>
                                    <a href="<?= base_url() ?>index.php/bodega_productos_quimicos/editar_mat_prima/<?php echo $fila->id_mat_prima ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/bodega_productos_quimicos/eliminar_mat_prima/<?php echo $fila->id_mat_prima ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
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

