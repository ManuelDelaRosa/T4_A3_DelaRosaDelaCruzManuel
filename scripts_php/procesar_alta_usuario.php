<?php 

	session_start();

	$error_usuario = "";
	$error_contra = "";

	$host="localhost";
    $usuario = "root";
    $con = "manuel";
    $bd = "usuarios_escuela_web";

    $conexion = new mysqli($host, $usuario, $con, $bd);

    if($conexion->connect_error){
    	die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
	}
	if (isset($_POST['caja_usuario']) && isset($_POST['caja_c'])) {
		if (!empty($_POST['caja_usuario']) && !empty($_POST['caja_c'])) {
			if (strlen($_POST['caja_usuario'])==8) {
				$u = $_POST['caja_usuario'];
				$c = $_POST['caja_c'];
				$u = limpiarCadena($u);
				$c = limpiarCadena($c);

				//Proceso de alta de usuario
				$sql = $conexion->prepare("INSERT INTO usuarios VALUES(sha1($u), sha1($c))");

				$sql->bind_param('ss', $u, $c);

				if ($sql->execute()) {
					$_SESSION['usuario_agregado'] = "Usuario agregado con exito";
				}else{
					$_SESSION['usuario_agregado'] = "Error al agregar el usuario";
				}

					$sql->close();

				header("location:../vista/formulario_registro_usuario.php");

				
			}else{
				//$error_usuario = "Debe ser de 8 caracteres";
				$_SESSION['error_usuario'] = "Debe ser de 8 caracteres";
				$_SESSION['valor_usuario'] = $_POST['caja_usuario'];
				$_SESSION['valor_c'] = $_POST['caja_c'];
				header("location:../vista/formulario_registro_usuario.php");
			}
		}else{
			$error_usuario = "Usuario vacio";
			$error_contra = "Contraseña vacia";	
			header("location:../vista/formulario_registro_usuario.php");
		}
	}

	
	function limpiarCadena($cadena){
		$cadena = trim($cadena);
		$cadena = stripslashes($cadena);
		$cadena = htmlspecialchars($cadena);
		return $cadena;

	}

 ?>