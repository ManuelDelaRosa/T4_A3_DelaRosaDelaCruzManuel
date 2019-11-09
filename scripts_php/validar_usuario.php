<?php 
	
	$conexion = mysqli_connect('localhost:3306', 'root', 'manuel', 'usuarios_escuela_web');

	if ($conexion) {
		echo "Se  conecto" . "<br>";

		$u = $_POST['caja_usuario'];
		$c = $_POST['caja_contraseña'];
		
		$u_cifrado = sha1($u);
		$c_cifrado = sha1($c);

		$sql = "SELECT * FROM usuarios WHERE usuario = '$u_cifrado' AND contra = '$c_cifrado'";

		$res = mysqli_query($conexion, $sql);

		if (mysqli_num_rows($res)==1) {
			session_start();
			$_SESSION['autenticado'] = true;
			$_SESSION['usuario'] = $u;
			header("location:../vista/menu_principal.php");
		}else{
			header("location:../vista/login_usuario.php");
			echo "ACCESO DENEGADO";
		}

	}else{
		header("location:../vista/login_usuario.php");
	}
?>