<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Autenticación</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url();?>js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">
      
<div class="container">
    
    <?php echo form_open('login/validarCredenciales', array('class' => 'form-signin'));?>
        <h2 class="form-signin-heading"><?php echo $this->lang->line('msg_autentication');?> </h2>
        <label for="inputUser" class="sr-only"><?php echo $this->lang->line('msg_user');?></label>
        
        <input type="text" value="<?php echo set_value('nameInputUser'); ?>" name="nameInputUser" id="inputUser" class="form-control" placeholder="User" required autofocus>
        <?php echo form_error('nameInputUser', '<p class="alert-danger">', '</p>');?>
        
        <label for="inputPassword" class="sr-only"><?php echo $this->lang->line('msg_password');?></label>
        <input value="" type="password" name="nameInputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    
</div> <!-- /container -->



<script src="<?php echo base_url();?>js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
