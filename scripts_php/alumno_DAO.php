<?php
	include_once("Conexion_bd.php");
	class AlumnoDAO {
		
		private  $conexion;
		public function __construct(){
			$this->conexion=new ConexionBD();
		}
		
		//=========================Metodos ABCC==========================
		//
		//
		//
		//=========================ALTAS=================================

		public function agregar($nc,$nom,$app,$apm,$edad,$sem,$carr){

				$sql ="INSERT INTO ALUMNOS VALUES('$nc','$nom','$app','$apm',$edad,$sem,'$carr')";


				$res=mysqli_query($this->conexion->getConexion(),$sql);
				if($res){
					//echo "Exito";
					header("location:../vista/altas.php");
					echo "<script> alert('Agregado Correctamente...');</script>";
					
				}else{
					echo "Fracaso";
					echo mysqli_error($this->conexion->getConexion());
				}
		}

		//=========================BAJAS===========================================

		public function eliminar($nc){
			$sql = "DELETE FROM alumnos WHERE Num_Control='$nc'";
			$res = mysqli_query($this->conexion->getConexion(), $sql);  
			if($res){

				header("location:../vista/eliminar_cambios.php");
			}else{
				echo "<br>Error en eliminar  =(  ";
				echo mysqli_error($this->conexion->getConexion());
			}
		}


		//=========================Consultas===========================================

		public function obtenerTodos(){
			$sql="SELECT * FROM alumnos";
			$res=mysqli_query($this->conexion->getConexion(),$sql);
			if($res){
					return $res;
					
				}else{
					echo "Fracaso en la CONSULTA";
					echo mysqli_error($this->conexion->getConexion());
				}
		}

		public function obtenerNC($nc){
			$sql="SELECT * FROM alumnos WHERE Num_Control LIKE '%$nc%'";
			$res=mysqli_query($this->conexion->getConexion(),$sql);
			if($res){
					return $res;
					
				}else{
					echo "Fracaso en la CONSULTA";
					echo mysqli_error($this->conexion->getConexion());
				}
		}

		public function obtenerN($n){
			$sql="SELECT * FROM alumnos WHERE Nombre_Alumno LIKE '%$n%'";
			$res=mysqli_query($this->conexion->getConexion(),$sql);
			if($res){
					return $res;
					
				}else{
					echo "Fracaso en la CONSULTA";
					echo mysqli_error($this->conexion->getConexion());
				}
		}

		public function obtenerAP($ap){
			$sql="SELECT * FROM alumnos WHERE Primer_Ap_Alumno LIKE '%$ap%'";
			$res=mysqli_query($this->conexion->getConexion(),$sql);
			if($res){
					return $res;
					
				}else{
					echo "Fracaso en la CONSULTA";
					echo mysqli_error($this->conexion->getConexion());
				}
		}

		//==============================CAMBIOS=================================
		public function obtenerCambio($nc){
			$sql="SELECT * FROM alumnos WHERE Num_Control = '$nc'";
			$res=mysqli_query($this->conexion->getConexion(),$sql);
			if($res){
					return $res;
					
				}else{
					echo "Fracaso en la CONSULTA";
					echo mysqli_error($this->conexion->getConexion());
				}
		}


		public function cambiar($nc,$nom,$app,$apm,$edad,$sem,$carr){

				$sql = "UPDATE alumnos SET Nombre_Alumno ='$nom', Primer_Ap_Alumno = '$app', Segundo_Ap_Alumno = '$apm', Edad = $edad, Semestre = $sem, Carrera = '$carr' WHERE Num_Control = '$nc'";

				$res=mysqli_query($this->conexion->getConexion(),$sql);
				if($res){
					//echo "Exito";
					header("location:../vista/eliminar_cambios.php");
					echo "<script> alert('Modificado Correctamente...');</script>";
					
				}else{
					echo "Fracaso";
					echo mysqli_error($this->conexion->getConexion());
				}
		}

	}

?>