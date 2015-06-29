 <?php $this->load->view('headers/menu_produccion') ?>

    <div class="starter-template">   
                    <p class="lead"><b>Registrar Orden de Producción </b></p>
                </div>

    <div class="container">
        <div class="row">
            <div class="col-md-14">     
       
         
      <?php $atributos = array('class' => 'form-horizontal') ?>
      <?php echo form_open('', $atributos) ?>
                
    <?php echo form_close() ?>
         
                <table class="table table-striped  table-bordered">
            <thead>
                <th ></th>
            <th >No. de Orden</th>           
            <th >Fecha</th>
            <th >Lista de Productos</th>
            <th >Responsable</th>
            <th >Observaciones</th>
            <th>Estado</th>
            <th>Comprobar Orden</th>
            </thead>
            
            <tbody>                
             
             <tr>          
                 <td>
                     <input type="checkbox" name="">
                 </td>
                 <td>1</td>
                 <td>13/05/15</td>
                 <td></td>
                 <td>
                     <input type="text" class="form-control" name="responsable" placeholder="" value="">
                 </td>
                 <td>
                     <input type="text" class="form-control" name="observaciones" placeholder="" value="">
                 </td>
                 <td>
                     Producción
                 </td>
                 <td><a>Comprobar</a></td>
            </tr>
                
            <tbody>
                
        </table> 
                
                 
                <div class="form-group">                  
    <div class="col-sm-offset-2 col-sm-4">
    <button type="submit" class="btn btn-primary">Registrar</button>
   
    </div>  
                </div>    
                
    </div>
            </div>
        </div>

