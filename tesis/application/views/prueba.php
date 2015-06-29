<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Home</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">              
            <li><a href="<?=base_url()?>index.php/administraccion/index">Administración</a></li>
            <li><a href="<?=base_url()?>index.php/produccion/index">Producción</a></li>
            <li><a href="<?=base_url()?>index.php/ventas/index">Ventas</a></li>
            <li><a href="<?=base_url()?>index.php/almacen/index">Almacén</a></li>
            <li><a href="<?=base_url()?>index.php/reportes/index">reportes</a></li>           
            <li><a href="#contact">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    

      <div class="starter-template">
          <br>
          <br>
          <br>
       
          <?php for($i=0;$i<$numero;$i++) { ?>
        <h1>Bienvenido a la Aplicacion</h1>
        <p class="lead">En esta vista puede encontrar los distintos modulos con que cuenta la aplicacion.</p>
       
        <a href="<?=base_url()?>index.php/welcome/prueba/<?php echo 1 ?>">yo</a>         
          <?php } ?>
      </div>
    
<table>
    <tr>
        <td></td>
        <td></td>
    </tr>
</table>
