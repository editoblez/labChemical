
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b>Editar Materia Prima</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administraccion/actualizar_mat_prima', $atributos) ?>

            <?php foreach ($var as $fila) { ?>                
                
                <input type="hidden" name="id" value="<?php echo $fila->id_materia_prima ?>"> 

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre de Material</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo $fila->nombre ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Unidad de Medida</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="unidad_medida"> 
                            <option><?php echo $fila->unidad_medida ?></option>              
                            <option value="Kg">Kg</option>
                            <option value="Litros">Litros</option>
                            <option value="Metros">Metros</option>
                        </select>
                    </div>
                </div>

            <?php } ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>      



        </div>
    </div>
</div>

