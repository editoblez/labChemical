
<?php $this->load->view('headers/menu_bodega_productos_quimicos') ?>

<div class="starter-template">   
    <p class="lead"><b>Stock de Materia Prima</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('bodega_productos_quimicos/buscar_mat_prima', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"> Nombre</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="buscar" placeholder="nombre">
                </div>
                <br>
                <div class="col-sm-offset-2 col-sm-10">  
                <label for="inputEmail3" class="alert-danger"> <?php echo form_error('buscar');?> </label>
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
                
                <th>Cantidad</th>
                </thead>

                <tbody> 
                    <?php 
                    if ($var1 == false) { 
                         if ($var != false) { 
                              foreach ($var as $fila) { 
                                echo '<tr>';   
                                   echo '<td>'. $fila->nom_mat_prima .'</td>';                               
                                   
                                    echo '<td>' . $fila->cantidad . '</td>';

                                echo '</tr>';
                             }  
                         } 
                       
                     } else {
                       if ($var1 != false) { 
                              foreach ($var1 as $fila) { 
                                echo '<tr>';   
                                   echo '<td>'. $fila->nom_mat_prima .'</td>';                               
                                    
                                    echo '<td>' . $fila->cantidad . '</td>';

                                echo '</tr>';
                             }  
                         } 
                       
                     }
                     ?> 
                <tbody>
            </table> 

           <?php echo form_close() ?>
        </div>
    </div>
</div>

