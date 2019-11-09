<!DOCTYPE html>
<html lang="es">
	<head>
		<title>LOGIN</title>
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
                        	<form id="login-form" class="form" action="../scripts_php/validar_usuario.php" method="POST">
                            	<h3 class="text-center text-info">Login</h3>
                            	<div class="form-group">
                                	<label for="username" class="text-info">Usuario:</label><br>
                                	<input type="text" name="caja_usuario" id="caja_usuario" class="form-control">
                            	</div>
                            	<div class="form-group">
                                	<label for="password" class="text-info">Contraseña:</label><br>
                                	<input type="password" name="caja_contraseña" id="caja_contraseña" class="form-control">
                            	</div>
                            	<div class="form-group">
                                	<input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                    <a href="formulario_registro_usuario.php" class="btn btn-info" role="button">Registrar</a>
                            	</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
        	</div>
    	</div>
	</body>
</html>