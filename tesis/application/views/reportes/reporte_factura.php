 <?php $this->load->view('headers/menu_reporte') ?>

    <div class="starter-template">   
                    <p class="lead"><b> Reporte de Facturas </b></p>
                </div>

    <div class="container">
        <div class="row">
            <div class="col-md-14">     
       
         
      <?php $atributos = array('class' => 'form-horizontal') ?>
      <?php echo form_open('', $atributos) ?>
          
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
  
    <?php echo form_close() ?>
         
                <table class="table table-striped  table-bordered">
            <thead>
            <th >No. Factura</th>           
            <th >Fecha de factura</th>
            <th >Nombre del Cliente</th>
            <th >Valor Total</th>
            </thead>
            
            <tbody>     
             <tr>          
                 <td>1</td>
                 <td>13/05/2015</td>
                  <td>CAAP</td>
                 <td></td>
            </tr>
                
            <tbody>
                
        </table> 
                
                 
                <div class="form-group">                  
    <div class="col-sm-offset-2 col-sm-4">
    <button type="submit" class="btn btn-primary">Imprimir</button>
   
    </div>  
                </div>    
                
    </div>
            </div>
        </div>

