<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Lista de Productos de la Orden </b></p>
    <h3><a href="<?= base_url() ?>index.php/produccion/ver_orden_produccion" >Atras</a></h3>
    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            

            <table class="table table-striped  table-bordered" width="30%">
                <thead >               
                <th>Productos</th>           
                <th>Cantidad</th>
                <th>Costo</th>
                <th>Fórmula</th>
                </thead>

                <tbody>                
                   <?php if($var !=false){ ?>
                    <?php foreach ($var as $fila) { ?>
                    <tr>                                     
                        <td><?php echo $fila->producto ?></td>
                        <td><?php echo $fila->cantidad ?></td>
                        <td><?php echo $fila->costo ?></td>
                        <td><?php echo $fila->formula ?></td>
                    </tr>
                    <?php } ?>
                     <?php } ?>
                <tbody>

            </table>             
             <?php echo form_close() ?>
        </div>
    </div>
</div>

