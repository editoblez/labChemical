<?php $this->load->view('headers/menu_reporte') ?>

<div class="starter-template">   
    <p class="lead"><b> Reporte de Ordenes de Producción </b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     

            <?php echo validation_errors() ?>
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('reportes/mostrar_reportes_ordenes_produccion', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Inicio</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="fecha_inicio"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Final</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="fecha_fin"  value="">
                </div>
            </div>

            

            <table class="table table-striped  table-bordered">
                <thead>
                <th >No. Orden</th>           
                <th >Fecha de Orden</th>
                <th >Materiales</th>
                </thead>

                <tbody>
                    <?php if ($var != false) { ?>
                        <?php foreach ($var as $fila) { ?>
                            <tr>          
                                <td><?php echo $fila->numero_orden ?></td>
                                <td><?php echo $fila->fecha ?></td>
                                <td>
                                     <a href="<?= base_url() ?>index.php/reportes/mostrar_materiales_orden_produccion/<?php echo $fila->numero_orden ?>" class="label label-primary">Ver</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>

            </table> 


            <div class="form-group">                  
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-primary">Generar</button>

                </div>  
            </div>    
           <?php echo form_close() ?>
        </div>
    </div>
</div>

