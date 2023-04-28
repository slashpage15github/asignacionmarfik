<?php
include('class/class_registro_dal.php');
session_start();

$matricula = $_SESSION["session_mat"];

$obj = new registro_dal();
$alumno = $obj->get_datos_alumno($matricula);

$carrera = $obj->get_datos_lista_carreras();



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>Matrícula encontrada</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

<style type="text/css" media="screen">
 .abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
  
}   
</style>
</head>

<body>
<div class="main">
    <div class="container">
        <div class="signup-content">
            <div class="signup-img">
                <img src="images/signup-img.jpg" alt="">
            </div>
            <div class="signup-form">
                <h1>Solicitud para Materias de Verano</h1>
                <form onsubmit="return valida_alumno();" action="class/test_especiales.php" method="post" id="vera">
                
                <div class="form-group">
                    <label id="lblmat" for="matricula">Matricula :</label>
                    <input type="text" maxlength="8"
                           name="imatricula" id="imatricula"
                           placeholder="Ingresa tu Matricula" value="<?php echo $matricula ?>" 
                           readonly="true"
                           />
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre :</label>
                    <input id="inombre" maxlength="35" name="inombre"
                           onkeypress=" return soloLetras(event);" readonly type="text"
                           value="<?php echo $alumno->getNombre(); ?>" readonly="true"/>
                </div>
                <div class="form-group">
                    <label for="correo">Correo :</label>
                    <input type="email" name="icorreo" id="icorreo"
                           placeholder="Ingresa tu Correo Electronico"/>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono :</label>
                    <input type="text" name="itelefono" id="itelefono" pattern="[0-9]{10}"
                    title = "Ingrese lada + telefono ej.8441004545"
                           maxlength="10" onkeypress="validar_mtr(event);"
                           placeholder="Ingresa tu Telefono"/>
                </div>
                    <div class="form-group">
                        <label for="grado">Grado :</label>
                        <div class="form-select">
                            <input type="text"
                                   name="igrado" id="igrado" value="<?php echo $alumno->getGrado(); ?>" readonly="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera :</label>
                        <div class="form-select">
 
                             <select name="f_carrera" id="f_carrera" style="color:red;font-size: 17px;font-weight: bold;">
                                <!--<option value="0" disabled selected>Ingresa tu Carrera: </option>-->
                                <?php
                                foreach ($carrera as $key => $value) {
                                    ?>
                                    <option value="<?=$value->cve_plan; ?>"><?=$value->nombre_carera;?></option>
                                <?php  }  ?>
                            </select>
                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="materias">Materias :</label>
                        <div class="form-select">
                            <select name="f_materias" id="f_materias">
                            <option value="0" disabled selected>Ingresa la Materia: </option>
                            </select>
                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus :</label>
                        <div class="form-select">
                            <input type="text"
                                   name="iestatus" id="iestatus" value="Activo" readonly="true"/>
                        </div>
                    </div>
                    
                <!--<input type="reset" value="Limpiar" class="submit" name="reset" id="reset"/>-->
<div class="abs-center">              
<div class="form-group">

                <input type="submit" value="Registrar" class="submit" name="submit" id="submit"/>
                </div>
               </div> 
            
                </form>
            </div>

        </div>
    </div>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/sweetalert2.all.min.js" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function () {

    $("#f_carrera").val("<?= $alumno->getId_carrera(); ?>").change();
    //$('#f_carrera').prop('disabled', 'disabled');
    $('#f_carrera :not(:selected)').attr('disabled','disabled');
    //$('#f_carrera').attr('disabled', true);

  



  }) ; 
</script>
