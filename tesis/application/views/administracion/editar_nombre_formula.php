<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_ingredients')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?></b></p>
    <h3><a href="<?= base_url() ?>index.php/administracion/formula" ><?php echo $this->lang->line('msg_atras');?></a></h3>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/actualizar_nombre_formula', $atributos) ?>
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_la')." ".$this->lang->line('msg_formula');?>Nombre de la Fórmula</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="nom_formula" name="nombre" placeholder="nombre" value="<?php echo $formula ?>">
                </div>
            </div>  
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('msg_editar');?></button>
                </div>
            </div>   
            <?php echo form_close() ?>
        </div>
    </div>
</div>

