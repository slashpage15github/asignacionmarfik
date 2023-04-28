<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asignación FS</title>
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
function valida_expediente(){
     if(document.getElementById("can_exp").value.length==0){
     alert("Error: Campo Expediente vacío");
     return false;
 }
     else{
     	
//Añadimos la imagen de carga en el contenedor
        $('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');

        var expediente=document.getElementById('can_exp').value;
        //alert(expediente);
       var datos={expediente:expediente};
       //datos='92298';
        $.ajax({
            
                    url:'consultaexpediente.php',
                    type:'POST',
                    dataType:'html',
                    data:datos,
                    success:function(response){
                        //alert(response);
                        $("#contentplace").html(response); 
                        $("#contentplace").show();


                        //Cargamos finalmente el contenido deseado
                        $('#contentplace').fadeIn(1000).html(response);
                    },
                    error:function(xhr, desc,err){
                        console.log(xhr);
                        console.log("Details:"+desc+"error:"+err);

                    }
                    




            });
        
     }
     }

     
     function limpia_dato(){
   window.location.assign("horario_maestro.php");
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

<form class="form-inline">


<div class="row" style="margin-top: 0px">
            <div class="col-md-2">
                <IMG SRC = "images/UAdeC.png" width="150px" align="right"/>
            </div> 
            <div class="col-md-8">
            </div>
            <div class="col-md-2" >
                <IMG SRC = "images/logo.png" width="150px"/>
            </div>
</div>
 


<div class = "row">
    <div class="col-md-12"><h1 class="text-center">Acceso a maestros</h1></div>

    <div class = "col col-md-6" align="right">
    <label for = "exp" class = "control-label">Expediente:</label>
    <input type = "text" name = "can_exp" id = "can_exp" value ="" class ="form-control" maxlength="10" style ="text-transform: uppercase;font-size:17px;color:red;">
    </div>

    <div class = "col col-md-6" align="left">
    <input type = "button" class ="btn btn-warning btn-flat" value ="CONSULTAR" id="can_exps" name="can_exps" onclick ="return valida_expediente();">
    <input type ="button" class = "btn btn-warning btn-flat" value ="LIMPIAR DATOS"
      id = 'limpiar_pase_lista' onclick = "limpia_dato();">
    </div>
</div><!--fin del row -->
<br/>
<div class = "row">
<div class="col-md-2">
</div>
<div class="col-md-8">
        <div class="alert alert-warning alert-dismissable" id="myAlert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong style="font-size: 20px;">¡Aviso!</strong><span style="font-size: 17px;"> Maestro, si tu número de expediente tiene ceros a la izquierda omítelos para realizar la consulta, ejemplo: 0092299 solo ingrese 92299</span>
        </div>
</div>
<div class="col-md-2">
</div>
</div>

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
      $( "#can_exp" ).val('');
    $( "#can_exp" ).focus();
</script> 