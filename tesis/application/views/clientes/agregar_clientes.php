
<?php $this->load->view('headers/menu_clientes') ?>

<div class="starter-template">   
    <p class="lead"><b>Agregar Clientes</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('clientes/guardar_clientes', $atributos) ?>



            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre del Cliente</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">R.U.C</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="ruc" placeholder="ruc" value="<?php echo set_value('ruc') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Telefono </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="telefono" placeholder="telefono" value="<?php echo set_value('telefono') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-4">
                    <textarea  class="form-control" name="direccion" placeholder="direccion"><?php echo set_value('direccion') ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>  

            <?php echo form_close() ?>





        </div>
    </div>
</div>

