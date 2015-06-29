<?php $this->load->view('headers/menu_produccion') ?>

<div class="starter-template">   
    <p class="lead"><b>Editar Datos de la Orden de Producción </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('produccion/actualizar_datos_orden_produccion', $atributos) ?>
            
            <?php foreach ($datos_orden as $orden) { ?>
            
            <input type="hidden" name="id" value="<?php echo $orden->id_orden_produccion ?>">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">No. de Orden: </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="idnumero" name="numero"  value="<?php echo $orden->numero_orden ?>">
                </div>            
            </div> 

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Fecha de la Orden:  </label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="idfecha" name="fecha"  value="<?php echo $orden->fecha  ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Responsable: </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="idresponsable" name="responsable"  value="<?php echo $orden->responsable ?>">
                </div>            
            </div> 
            <?php } ?>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-12">
                    <button type="submit" class="btn btn-primary">Editar</button>               
                </div>
            </div>            

            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

