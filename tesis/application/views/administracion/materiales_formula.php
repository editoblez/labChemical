<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_ingredientes')." " .$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?></b></p>
    <h3><a href="<?= base_url() ?>index.php/administracion/formula" ><?php echo $this->lang->line('msg_atras');?></a></h3>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>



            <table class="table table-striped  table-bordered" width="30%">
                <thead >               
                <th ><?php echo $this->lang->line('msg_materia_prima');?></th>           
                <th ><?php echo $this->lang->line('msg_cantidad');?></th>

                </thead>

                <tbody>                
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>                                     
                                <td><?php echo $fila->ingredientes ?></td>
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

