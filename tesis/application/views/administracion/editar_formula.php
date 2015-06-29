<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_editar')." ".$this->lang->line('msg_formula');?> </b></p>
    <h3><a href="<?= base_url() ?>index.php/administracion/formula" ><?php echo $this->lang->line('msg_atras');?></a></h3>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            <input type="hidden" name="id" value="<?php echo $id ?>"> 
            <table class="table table-striped  table-bordered" >
                <thead >               
                <th><?php echo $this->lang->line('msg_nombre')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?>Nombre de la Formula</th> 
                <th><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>
                <tbody>                
                <td><?php echo $formula ?></td>  
                <td>
                    <a href="<?= base_url() ?>index.php/administracion/editar_nombre_formula/<?php echo $id ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
                </tbody>
            </table>   

            <table class="table table-striped  table-bordered" >
                <thead >               
                <th ><?php echo $this->lang->line('msg_materia_prima');?></th>           
                <th ><?php echo $this->lang->line('msg_cantidad');?></th>
                <th><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>

                <tbody>                
                    <?php if ($materiales != false) { ?>
                        <?php foreach ($materiales as $fila) { ?>
                            <tr>                                     
                                <td><?php echo $fila->ingredientes ?></td>
                                <td><?php echo $fila->cantidad ?></td>
                                <td>
                                    <a href="<?= base_url() ?>index.php/administracion/editar_ingrediente_formula/<?php echo $fila->id_ingredientes_formula ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administracion/eliminar_ingrediente_formula/<?php echo $fila->id_ingredientes_formula ?>" class="label label-success"><span class="glyphicon glyphicon-remove"></span></a>                  
                                    &nbsp;
                                    <a href="<?= base_url() ?>index.php/administracion/agregar_ingrediente_formula/<?php echo $id ?> " class="label label-info"><span class="glyphicon glyphicon-plus"></span></a>                  
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

