<?php
  ob_start();
?>
<?php
include('class/class_registro_dal.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['imatricula']) && isset($_POST['imatricula'])) {

        $matricula = $_POST['imatricula'];
        $matricula = trim($matricula);

        $obj = new registro_dal();
        $existe = $obj -> existe_matricula_especiales($matricula);

        if ($existe === 1) {
            $_SESSION['session_mat'] = $matricula;
            header('location: show_respuesta.php');
        } 
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Error: no existe la matricula")';
            echo '</script>';
            header('refresh:0; ver_respuesta.php');
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error: Matricula No ingresada.")';
        echo '</script>';
        header('refresh:0; ver_respuesta.php');
    }
}
else {
    echo '<script type="text/javascript">';
    echo 'alert("No se encontró la matrícula 2, vuelva a intentar.")';
    echo '</script>';
    header('refresh:0; ver_respuesta.php');
}
?>
<?php 
 ob_end_flush();
?>