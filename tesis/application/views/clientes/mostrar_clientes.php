
<?php $this->load->view('headers/menu_clientes') ?>

<div class="starter-template">   
    <p class="lead"><b>Mostrar Lista de Clientes</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            <table class="table table-striped  table-bordered">
                <thead>
                <th>Nombre</th>
                <th>R.U.C</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Acciones</th>
                </thead>

                <tbody> 
                    <?php if ($var != false) { ?>                    
                        <?php foreach ($var as $fila) { ?>
                            <tr>   
                                <td><?php echo $fila->nombre ?></td>                                
                                <td><?php echo $fila->ruc ?></td>
                                <td><?php echo $fila->telefono ?></td>                                
                                <td><?php echo $fila->direccion ?></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/clientes/editar_clientes/<?php echo $fila->id_clientes ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/clientes/eliminar_clientes/<?php echo $fila->id_clientes ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                </td>
                            </tr>
                        <?php } ?>  
                    <?php } ?>

                <tbody>
            </table> 
        </div>
    </div>
</div>

