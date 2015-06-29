
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_ingredientes');?></b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administracion/agregar_ingredientes', $atributos) ?>           

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_ingredientes');?></label>
                <div class="col-sm-2">
                    <?php
                    if ($mat_prima != false) {
                        echo '<select class="form-control" name="mat_prima" >';
                        foreach ($mat_prima as $fila) {
                            echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo 'Inserte las Materias Primas';
                    }
                    ?> 
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('msg_cantidad');?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cantidad" placeholder="cantidad" value="<?php echo set_value('cantidad') ?>">
                </div>
            </div>    

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="ingrediente"><?php echo $this->lang->line('msg_agregar')." ".$this->lang->line('msg_ingredientes');?></button>

                </div>
            </div>      

            <?php echo form_close() ?>

            <table class="table table-striped  table-bordered">
                <thead>
                <th <th ><?php echo $this->lang->line('msg_name')." ".$this->lang->line('msg_de')." ".$this->lang->line('msg_ingredientes');?></th>Nombre de Ingrediente</th              
                <th ><?php echo $this->lang->line('msg_cantidad');?></th>
                <th ><?php echo $this->lang->line('msg_acciones');?></th>
                </thead>

                <tbody>                
                    <?php if ($var != false) { ?> 
                        <?php foreach ($var as $fila) { ?>
                            <tr>                          
                                <td>
                                    <?php echo $fila->nombre_ingrediente ?>  
                                </td>
                                <td>
                                    <?php echo $fila->cantidad ?>  
                                </td>
                                <td>
                                    <a href="" class="label label-primary">  <span class="glyphicon glyphicon-pencil"></span></a>  
                                    &nbsp;
                                    <a href="" class="label label-danger">  <span class="glyphicon glyphicon-remove"></span></a>  
                                </td>
                            <?php } ?>           
                        </tr>
                    <?php } ?>
                <tbody>

            </table> 

        </div>
    </div>
</div>

