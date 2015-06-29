<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Ventas</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="<?=base_url()?>index.php/ventas/orden_venta">Crear Orden de Venta</a></li>            
            <li><a href="<?=base_url()?>index.php/ventas/generar_factura">Crear Factura</a></li>
            <li><a href="<?=base_url()?>index.php/ventas/anular_factura">Anular Factura</a></li>            
            <li><a href="<?=base_url()?>index.php/ventas/index">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>