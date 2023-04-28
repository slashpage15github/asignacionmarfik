<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="../vendor/sweetalert2.all.min.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
</head>
<body>
</body>
</html>
<?php
ob_start();
?>
<?php
include('class_especiales_dal.php');

        if (isset($_POST["imatricula"])) 
        {
            $matricula = $_POST["imatricula"];

        }
        else{
            echo "No se recibio datos de Matrícula, revisar situación en control Escolar. ";
            exit;
        }

        
        if (isset($_POST["f_materias"])) 
        {
            $materias=$_POST["f_materias"];
        }
        else{
            echo "No se recibio datos de Materias, revisar situación en control Escolar. ";
            exit;
        }
$email=$_POST["icorreo"];
$telefono=$_POST["itelefono"];
$estatus=$_POST["iestatus"];
$grado=$_POST["igrado"];

        if (isset($_POST["f_carrera"])) 
        {
            $carrera=$_POST["f_carrera"];
        }
        else{
            echo "No se recibio datos de Carrera, revisar situación en control Escolar. ";
            exit;
        }            


$nombre=strtoupper($_POST["inombre"]);

if ($estatus == "Activo" || $estatus == 1) {
    $estatus = 1;
}
else {
    $estatus = 0;
}


$obj=new especiales($matricula,$materias,$email,$telefono,$estatus,$grado,$carrera,$nombre);
$obj2 = new especiales_dal();

$num_especiales = $obj2 -> num_especiales($matricula);

$num_sol_mat_mate_car = $obj2 -> existe_matricula_materia_carrera($matricula,$materias,$carrera);
if ($num_sol_mat_mate_car==0){

if ($num_especiales<2){


$resultado2=$obj2-> insertar($obj);
// $num_especiales = $obj2 -> num_especiales($matricula);
// echo $num_especiales;

//echo $resultado2;

if($resultado2 == 1){
    echo '<script type="text/javascript">';
    //echo 'alert("Registrado!")';
    echo "Swal.fire({
                type: 'success',
                title: '¡Registrado!',
                html: '<b>* Materia registrada correctamente.</b>'}).then(function() {
                            window.location = '../busca_matricula.php';
                          });";
    echo '</script>';
    //header('refresh:0; ../busca_matricula.php');
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Ocurrio un error!")';
    echo '</script>';
    header('refresh:0; ../busca_matricula.php');
}
ob_end_flush();
}//if ($num_especiales<2)
else{
header("Location: ../busca_matricula.php");
}
}//if ($num_sol_mat_mate_car==0)
else{
    echo '<script type="text/javascript">';
    //echo 'alert("Registrado!")';
    echo "Swal.fire({
                type: 'error',
                title: '¡Matrícula y Materia ya Registrada',
                html: '<b>* La Materia que intenta registrar ya se encuentra asignada a la matrícula que intenta registrarla, verifique por favor.</b>'}).then(function() {
                            window.history.back();
                          });";
    echo '</script>';
}
?>