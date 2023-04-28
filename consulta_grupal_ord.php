<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Asignación puntual Ordinario Grupal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/js/myfunctions_js.js"></script>
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 55px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    <script>
        function valida_matricula() {
            if(document.getElementById("can_mat").value.length==0) {
                alert("Error: Campo matrícula vacío");
                return false;
            }
            else {
                var matricula=document.getElementById('can_mat').value;
                var datos={matricula};
                /*$.ajax({
                
                    url:'consultamatricula_adiministrador.php',
                    type:'POST', dataType:'html',
                    data:datos,
                    success: function(response) {
                        //alert(response);
                        $("#contentplace").html(response); 
                        $("#contentplace").show();
                    },
                    error:function(xhr, desc,err) {
                        console.log(xhr);
                        console.log("Details:"+desc+"error:"+err);
                    }
                });*/
            }
        }
        function limpia_dato(){
            window.location.assign("consulta_grupal_ord.php");
        }
    </script>
</head>
<body>
    <?php
        if (!isset($_SESSION['usuario']))
            include('menu_publico.php');
        else
            include('menu_privado.php');
    ?>
    <div id = "contenedor">
        <div class="col-md-12">
            <form class="form-inline" action="log_forma_grupos_abc.php" method="POST">
                <div class="row" style="margin-top: 0px">
                    <div class="col-md-2">
                        <a href="http://www.sistemas.uadec.mx/" target="_blank"><img src="images/logo.png" width="150px" align="right"/></a>
                    </div> 
                    <div class="col-md-8"></div>
                    <div class="col-md-2" >
                        <a href="http://www.uadec.mx/" target="_blank"><img src= "images/UAdeC.png" width="150px"/></a>
                    </div>
                </div>


                <div class = "row">
                    <div class="col-md-12"><h1 class="text-center">Modificación de Grupos (Ordinarios)</h1></div>
                    <div class = "col col-md-6"  align="right">
                        <label for = "clave" class = "control-label">Ingrese Materia:</label>
                        <input type = "text" name = "materia" id = "materia" value ="" class ="form-control" maxlength="30" style ="text-transform: uppercase;font-size:17px;color:red;" required="true">                       
                    </div>
                
                    <div class = "col col-md-6" align="left">
                        <input type = "submit" class ="btn btn-warning btn-flat" value ="CONSULTAR" id='can_exp' name='can_exp' style="background-color: #474241; border-color: #474241">
                        <input type ="button" class = "btn btn-warning btn-flat" value ="LIMPIAR DATOS" id = 'limpiar_pase_lista'onclick = "limpia_dato();" style="background-color: #474241; border-color: #474241">
                    </div>
                </div><!--fin del row -->


                <div class = "row">
                    <div class="col-md-12">
                        <div id="contentplace" class="text-center"></div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- contenedor-->

    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<script>
    $( "#materia" ).val('');
    $( "#materia" ).focus();
</script>