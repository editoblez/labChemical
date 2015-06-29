 <?php $this->load->view('headers/menu_venta') ?>

    <div class="starter-template">   
                    <p class="lead"><b>Anular Factura </b></p>
                </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">     
       
         
      <?php $atributos = array('class' => 'form-horizontal') ?>
      <?php echo form_open('', $atributos) ?>
                
      <?php echo form_close() ?>
                
        <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Numero de Factura</label>
    <div class="col-sm-2">
    <input type="text" class="form-control" name="buscar" placeholder="numero">
    </div>
    </div>
        <br>      
    <br>
        
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    </div>         
                     <br>  <br>    <br>        
                <table class="table table-striped  table-bordered">
            <thead> 
            <th></th>
            <th >No. de Factura</th>           
            <th >Fecha</th>
            <th >Estado</th>
            </thead>
            
            <tbody>                
             
             <tr>       
                  <td><input type="checkbox" name=""></td>
                 <td>1</td>
                 <td>13/05/15</td>
                 <td></td>                
            </tr>
                 
           
            <tbody>
                
        </table> 
                
                 
                <div class="form-group">                  
    <div class="col-sm-offset-2 col-sm-4">
    <button type="submit" class="btn btn-primary">Anular</button>
   
    </div>  
                </div>    
                
            </div>
        </div>
</div>
        </div>

