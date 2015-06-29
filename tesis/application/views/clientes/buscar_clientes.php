
<?php $this->load->view('headers/menu_clientes') ?>

<div class="starter-template">   
    <p class="lead"><b>Buscar Clientes</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Numero de r.u.c</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="buscar" placeholder="nombre">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>         



            <table class="table table-striped  table-bordered">
                <thead>
                <th>Nombre</th>
                <th>R.U.C</th>
                <th>Telefono</th>
                <th>Dirección</th>
                
                </thead>

                <tbody> 
                    <?php if ($var != false) { ?>
                       <?php  foreach ($var as $fila) { ?>
                             <tr>
                             <td><?php echo $fila->nombre ?></td>
                             <td><?php echo $fila->ruc ?></td>
                             <td><?php echo $fila->telefono ?></td>
                             <td><?php echo $fila->direccion ?></td>
                             </tr>                       
                    
                       <?php } ?>
                  <?php } ?>
                </tbody>
           <?php echo form_close() ?>          
       </div>
    </div>
 </div>

