<!DOCTYPE html>
<html>
<head>
<script src="vendor/sweetalert2.all.min.js"></script>
</head>
<body>
</body>
</html>
<?php
ob_start();
?>
<?php
session_start();
include('class/class_registro_dal.php');
include('class/class_especiales_dal.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['imatricula']) && isset($_POST['imatricula'])) {

        $matricula = $_POST['imatricula'];
        $matricula = trim($matricula);

        $obj = new registro_dal();
        $obj2 = new especiales_dal();
        $existe = $obj->existe_matricula($matricula);
        $num_especiales = $obj2 -> num_especiales($matricula);

        if ($num_especiales <= 1){
            if ($existe === 1) {
                $_SESSION['session_mat'] = $matricula;
                header('location: matricula_registrada.php');
            } else {
                echo '<script type="text/javascript">';
                //echo 'alert("Error: Matrícula no encontrada, verifique bien el dato.")';
                echo "Swal.fire({
                type: 'error',
                title: 'Matrícula no localizada',
                html: '<b>* Matrícula no encontrada, verifique bien el dato.</b>'}).then(function() {
                            window.location = 'busca_matricula.php';
                          });";
                echo '</script>';
            
                //header('refresh:0; busca_matricula.php');

            }
        }
        else{
            echo '<script type="text/javascript">';
            //echo 'alert("Error: No puede registrar mas de 3 especiales.")';
            echo "Swal.fire({
                type: 'error',
                title: '2 Materias Registradas',
                html: '<b>* No puede registrar más de 2 materias para verano.</b>'}).then(function() {window.location = 'busca_matricula.php';});";
            echo '</script>';
            //header('refresh:0; busca_matricula.php');
        }

        
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error: Matricula No ingresada.")';
        echo '</script>';
        header('refresh:0; busca_matricula.php');
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("No se encontró la matrícula 2, vuelva a intentar.")';
    echo '</script>';
    header('refresh:0; busca_matricula.php');
}
?>
<?php
ob_end_flush();
?>


