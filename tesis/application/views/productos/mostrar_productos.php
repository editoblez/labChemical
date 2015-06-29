
<?php $this->load->view('headers/menu_productos') ?>

<div class="starter-template">   
    <p class="lead"><b> Lista de Productos Existentes</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            <table class="table table-striped  table-bordered">
                <thead>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Fecha de Creaccion</th>                
                <th>Costo</th>                
                </thead>
                <tbody> 
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>                                     
                                <td><?php echo $fila->nombre ?></td>
                                <td><?php echo $fila->cantidad ?></td>
                                <td><?php echo $fila->fecha ?></td>                                
                                <td><?php echo $fila->costo ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <tbody>
            </table> 
        </div>
    </div>
</div>

