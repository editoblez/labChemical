
<?php $this->load->view('headers/menu') ?>

<div class="starter-template">   
    <p class="lead"><b>Agregar Fórmulas</b></p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-14">     


           
            <?php $atributos = array('class' => 'form-horizontal') ?>
            <?php echo form_open('administraccion/insertar_formula', $atributos) ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre de la Fórmula</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>  
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label" >Materia Prima </label>
                <div class="col-sm-2">
                    <?php
                    if ($mat_prima != false) {
                        echo '<select class="form-control" name="mat_prima" id="mat_prima">';
                        foreach ($mat_prima as $fila) {
                            echo '<option value="' . $fila->nombre . '">' . $fila->nombre . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo 'No existen Materias Primas en el Sistema';
                    }
                    ?> 
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="cantidad" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>      

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-primary" name="formula" value="ingredientes" onclick="prueba()" >Agregar Ingredientes</button>
                    &nbsp;
                    <button type="button" class="btn btn-primary" name="formula" value="formula" onclick="send_data ()" >Guardar Formula</button>

                </div>
            </div>     
            <h3>Ingredientes de la Formula</h3>
            <?php
                echo form_close();
            ?>
            <form id="idFormula" action="insertar_formula" name="idForm" method="post">
                <input type="hidden" id="idNombre" name="nombre" value="1"/>
                <input type="hidden" id="idCantidad" name="cantidad" value="2"/>
            </form>
            <table class="table table-striped  table-bordered" id="ingredientes" >
               <thead>
                <th>Nombre</th>   
                <th >Cantidad</th>  
                </thead>
            </table>
                
            



            </form>
        </div>
    </div>
</div>

