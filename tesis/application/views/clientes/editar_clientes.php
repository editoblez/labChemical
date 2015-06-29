
<?php $this->load->view('headers/menu_clientes') ?>

<div class="starter-template">   
    <p class="lead"><b>Editar Clientes</b></p>
    <h3><a href="<?= base_url() ?>index.php/clientes/mostrar_clientes" >Atras</a></h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('clientes/actualizar_clientes', $atributos) ?>

            <?php foreach ($var as $fila) { ?>
                <input type="hidden" name="id" value="<?php echo $fila->id_clientes ?>">  

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre del Cliente</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo $fila->nombre ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">R.U.C</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="ruc" placeholder="ruc" value="<?php echo $fila->ruc ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Telefono </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="telefono" placeholder="telefono" value="<?php echo $fila->telefono ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-4">
                        <textarea  class="form-control" name="direccion" placeholder="direccion"><?php echo $fila->direccion ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>  

            <?php } ?>
        </div>
    </div>
</div>

