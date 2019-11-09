<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="utf-8">
	</head>
	<body>
		<div id="login">
        	<h3 class="text-center text-white pt-5">Login form</h3>
        	<div class="container">
            	<div id="login-row" class="row justify-content-center align-items-center">
                	<div id="login-column" class="col-md-6">
                    	<div id="login-box" class="col-md-12">
                        	<form id="login-form" class="form" action="../scripts_php/procesar_alta_usuario.php" method="POST">
                            	<h3 class="text-center text-info">Registrar usuario</h3>
                            	<div class="form-group">
                                	<label for="username" class="text-info">Usuario:</label><br>
                                	<input type="text" name="caja_usuario" id="caja_usuario" class="form-control" value="<?php echo isset($_SESSION['valor_usuario']) ? $_SESSION['valor_usuario'] : "" ?>">
                                    <span><?php echo isset($_SESSION['error_usuario']) ? $_SESSION['error_usuario'] : "" ?> </span>
                            	</div>
                            	<div class="form-group">
                                	<label for="password" class="text-info">Contraseña:</label><br>
                                	<input type="password" name="caja_c" id="caja_c" class="form-control" value="<?php echo isset($_SESSION['valor_c']) ? $_SESSION['valor_c'] : "" ?>">
                            	</div>
                            	<div class="form-group">
                                	<input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            	</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
        	</div>
    	</div>
	</body>
</html>

<?php 
    unset($_SESSION['error_usuario']);
?>