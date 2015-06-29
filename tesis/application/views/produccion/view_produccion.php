<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Producción</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url() ?>index.php/produccion/orden_pedido">Registrar Orden de Pedido</a></li>            
                <li><a href="<?= base_url() ?>index.php/produccion/ver_orden_pedido">Ver Orden de Pedido</a></li>            
                <li><a href="<?= base_url() ?>index.php/produccion/orden_produccion">Registrar Orden de Producción</a></li>
                <li><a href="<?= base_url() ?>index.php/produccion/ver_orden_produccion">Ver Orden de Producción</a></li>            
                <li><a href="<?= base_url() ?>index.php/produccion/bodega_produccion">Bodega de Producción</a></li>
                <li><a href="<?= base_url() ?>index.php/welcome/index">Salir</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="starter-template">
    <br>
    <br>
    <br>
    <h1>Bienvenido al Modulo Producción</h1>
    <p class="lead">En este modulo encotrara informacion de la producción de los productos de limpieza.</p>
</div>