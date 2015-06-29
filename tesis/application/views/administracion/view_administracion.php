
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""><?php echo $this->lang->line('msg_administracion');?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url()?>index.php/administracion/mostrar_usuario"><?php echo $this->lang->line('msg_user');?></a></li>
            <li><a href="<?=base_url()?>index.php/administracion/mostrar_mat_prima"><?php echo $this->lang->line('msg_materia_prima');?></a></li>           
            <li><a href="<?=base_url()?>index.php/administracion/formula"><?php echo $this->lang->line('msg_formula');?></a></li>
            <li><a href="<?=base_url()?>index.php/administracion/mostrar_producto"><?php echo $this->lang->line('msg_producto');?></a></li>
            <li><a href="<?=base_url()?>index.php/welcome/index"><?php echo $this->lang->line('msg_salir');?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="starter-template">
          <br>
          <br>
          <br>
        <h1><?php echo $this->lang->line('msg_modulo_administracion');?></h1>       
        <p class="lead"><?php echo $this->lang->line ('msg_inicio_modulo')." ".$this->lang->line('msg_modulo_administracion');?></p>
      </div>