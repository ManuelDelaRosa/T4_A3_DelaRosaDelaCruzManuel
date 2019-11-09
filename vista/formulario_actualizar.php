<?php 
	session_start();
	if ($_SESSION['autenticado'] == false) {
		header("location:login_usuario.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cambios en alumnos</title>
	</head>
	<body>

		<?php
		
			require_once('menu_principal.php');

		?>

		<h1>Cambios Alumnos</h1>
		<br>	
		<form method="POST" action="../scripts_php/procesar_cambio.php">
		<?php 
                        	include_once("../scripts_php/alumno_DAO.php");
							$aDAO = new AlumnoDAO();
							$listaAlumnos=$aDAO->obtenerCambio($_GET['nc']);

							while ($fila=mysqli_fetch_object($listaAlumnos)){
									$nc = $fila->Num_Control;
									$n = $fila->Nombre_Alumno;
									$pa = $fila->Primer_Ap_Alumno;
									$sa = $fila->Segundo_Ap_Alumno;
									$e = $fila->Edad;
									$s = $fila->Semestre;
									$c = $fila->Carrera;
		?>

				<br>
				<label>Numero de control: </label>
				<input type="text" name="numcontrol" value="<?php echo $nc;?>" readonly>
				<br>
				<label>Nombre: </label>
				<input type="text" name="nombre" value="<?php echo $n;?>">
				<br>
				<label>Primer Apellido: </label>
				<input type="text" name="app" value="<?php echo $pa;?>">
				<br>
				<label>Segundo apellido: </label>
				<input type="text" name="apm" value="<?php echo $sa;?>">
				<br>
				<label>Edad: </label>
				<input type="text" name="edad" value="<?php echo $e;?>">
				<br>
				<label>Semestre: </label>
				<input type="text" name="semestre" value="<?php echo $s;?>">
				<br>
				<label>Carrera: </label>
				<input type="text" name="carrera" value="<?php echo $c;?>">
								
										
		<?php
			}
		?>  
		
				<br>
				<input type="submit" name="" value="Guardar">
		</form>







</body>
</html>