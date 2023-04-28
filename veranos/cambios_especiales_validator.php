<?php
session_start();
include('class/class_registro_dal.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['imatricula']) && isset($_POST['imatricula'])) {

        $matricula = $_POST['imatricula'];
        $matricula = trim($matricula);

        $obj = new registro_dal();
        $existe = $obj->existe_matricula_especiales($matricula);

            if ($existe === 1) {
                $_SESSION['session_mat'] = $matricula;
                echo '<script type="text/javascript">';
                echo 'window.location.href="consulta_especiales.php"';
                echo '</script>';

                //header('location: consulta_especiales.php');

            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: No tienes especiales registrados");';
                echo 'window.location.href="cambios_especiales.php"';
                echo '</script>';
               //header('refresh:0; cambios_especiales.php');
            }

        
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error: Matricula No ingresada.");';
        echo 'window.location.href="cambios_especiales.php"';
        echo '</script>';
        //header('refresh:0; cambios_especiales.php');
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("No se encontró la matrícula 2, vuelva a intentar.");';
    echo 'window.location.href="cambios_especiales.php"';
    echo '</script>';
    //header('refresh:0; cambios_especiales.php');
}



