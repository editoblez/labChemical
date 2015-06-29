<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Destalles del Reporte </b></p>
    <h3><a href="<?= base_url() ?>index.php/reportes/reportes_ordenes_pedido" >Atras</a></h3>
    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            

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

