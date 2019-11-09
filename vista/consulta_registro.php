<?php 
    session_start();
    if ($_SESSION['autenticado'] == false) {
        header("location:login_usuario.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buscar alumnos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require_once('menu_principal.php'); ?>
    <div class="container">
        <h2>Buscar alumnos</h2>
        <form method="POST" action="buscar_registro.php">
            <div class="form-group">
                <div class="form-group">
                    <label><input type="radio" name="buscar" value="numControl"> Num. Control: </label>
                    <input type="text" class="form-control" placeholder="Ej. 15070110" name="txt_num_control">
                </div>
                <div class="form-group">
                    <label><input type="radio" name="buscar" value="nombre"> Nombre: </label>
                    <input type="text" class="form-control" placeholder="Ej. Gonzalo" name="txt_nombre">
                </div>
                <div class="form-group">
                    <label><input type="radio" name="buscar" value="primerAp"> Primer apellido: </label>
                    <input type="text" class="form-control" placeholder="Ej. De la Rosa" name="txt_primerAp">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Num. Control</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Edad</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                    include_once("../scripts_php/alumno_dao.php");
                    $aDAO = new AlumnoDAO();
                    $listaAlumnos=$aDAO->obtenerTodos();

                    if (isset($_REQUEST['buscar'])) {
                        $radio = $_REQUEST["buscar"];
                        $numero = $_POST["txt_num_control"];
                        $nombre = $_POST["txt_nombre"];
                        $primerApe = $_POST["txt_primerAp"];
                        if($radio == 'numControl'){
                            $listaAlumnos=$aDAO->obtenerNC($numero);
                        }
                        else if($radio == 'nombre'){
                            $listaAlumnos=$aDAO->obtenerN($nombre);
                        }
                        else if($radio == 'primerAp'){
                            $listaAlumnos=$aDAO->obtenerAP($primerApe);
                        }
                    }

                    while ($fila=mysqli_fetch_object($listaAlumnos)){
                            $nc = $fila->Num_Control;
                            $n = $fila->Nombre_Alumno;
                            $pa = $fila->Primer_Ap_Alumno;
                            $sa = $fila->Segundo_Ap_Alumno;
                            $e = $fila->Edad;
                            $s = $fila->Semestre;
                            $c = $fila->Carrera;
                ?>
                <tr>
                    <td><?php echo $nc;?></td>
                    <td><?php echo $n;?></td>
                    <td><?php echo $pa;?></td>
                    <td><?php echo $sa;?></td>
                    <td><?php echo $e;?></td>
                    <td><?php echo $s;?></td>
                    <td><?php echo $c;?></td>
                </tr>   
                <?php
                    }
                ?>  
            </tbody>
        </table>
        <br>
        <a href="menu_principal.php">Regresar</a>
    </div>
</body>
</html>