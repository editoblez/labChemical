
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Clientes</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url()?>index.php/clientes/agregar_clientes">Agregar</a></li>            
            <li><a href="<?=base_url()?>index.php/clientes/mostrar_clientes">Mostrar</a></li>            
            <li><a href="<?=base_url()?>index.php/clientes/buscar_clientes">Buscar</a></li>
            <li><a href="<?=base_url()?>index.php/clientes/ventas">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>