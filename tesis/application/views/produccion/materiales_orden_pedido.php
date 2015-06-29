<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Lista de Materiales de la Orden </b></p>
    <h3><a href="<?= base_url() ?>index.php/produccion/ver_orden_pedido" >Atras</a></h3>
    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('produccion/editar_orden_pedido', $atributos) ?>

            

            <table class="table table-striped  table-bordered" width="30%">
                <thead >               
                <th >Materia Prima</th>           
                <th >Cantidad</th>
                
                </thead>

                <tbody>                
                   <?php if($var !=false){ ?>
                    <?php foreach ($var as $fila) { ?>
                    <tr>                                     
                        <td><?php echo $fila->nombre ?></td>
                        <td><?php echo $fila->cantidad ?></td>
                       
                    </tr>
                    <?php } ?>
                     <?php } ?>
                <tbody>

            </table>             
             <?php echo form_close() ?>
        </div>
    </div>
</div>

