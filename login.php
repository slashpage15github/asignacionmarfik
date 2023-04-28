<?php
//session_start();
session_unset();//para eliminar las variables de sesion
//tino-include('sweet_alert/msgAlert_divs.php');
//session_destroy();



//session_destroy();
include('sweet_alert/msgAlert_divs.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Asignación FS</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/bootstrap-dialog.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">

    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
    <script src="js/myfunctions_js.js"></script>
   
<script>

function actucap(){
var obj=document.getElementById("cap");
if (!obj) obj=window.document.all.cap; //es para IE The document.all property is an array of all the HTML elements that are in the document.
if (obj){
obj.src= "captcha.php?" + Math.random();   //uso de parametro fantasma para evitar cache del navegador
}
}

  var Alert = new CustomAlert();

function dialogo_bootstrap(msg,url){
BootstrapDialog.show({
  title: 'Facultad de Sistemas UAdeC',
  type: BootstrapDialog.TYPE_SUCCESS,
  closable: false,
    message: msg,
    buttons: [{
      label: 'OK',
        action: function(dialog) {
          dialog.close();
          window.location.href=url;
        }
    }]
});
}

   function valida_usuario(){
    var usuario=$( "#usuario" ).val();
    var contra=$( "#contrasena" ).val();
    var capt=$( "#tmptxt" ).val();

    if (usuario.length==0){
      //dialogo_bootstrap('Registre un usuario:','login.php');
      
     Alert.render('Registre un usuario, no puede ir vacío, verifique.');
    }
    else if (contra.length==0){
      //dialogo_bootstrap('Registre su password:','login.php');
     Alert.render('Registre una contraseña, no puede ir vacía, verifique.');
    }
    else if (capt.length==0){
      //dialogo_bootstrap('Registre su password:','login.php');
     Alert.render('Registre el código de seguridad, no puede ir vacía, verifique.');
    }    
    else{
            $('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');

       var datos={usuario,contra,capt};
  $.ajax({
              url: 'verifica_usuario.php',
              type: 'POST',
              dataType: 'html',
              data: datos,
              success: function(response){
            
                if(response=="true")
                  {
  
                     //Alert.render("Candidato de desempeño, recargado con éxito.");
                     window.location.href = "index2.php";

                }else{
                      dialogo_bootstrap(response,'login.php');
                }         
              },
                error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                }
  });

    }
  }
</script>
   </head>

  <body >
<form class="form-signin" name="login" id="login" method="post" >
<?php
if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>


  <div class="container">

   <div class="row" style="border-style: none;">
    <div class="col-md-4"><img src = "images/uac.gif" width="70px"  style="padding-top: 7px;"/></div>
  <div class="col-md-4 col-md-offset-4"><img src = "images/logo.png"  width="200px" style="float: right;padding-top: 7px;"/></div>
    </div>


    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">

                <div class="panel-heading">
                
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <center>
                <IMG SRC = "images/seguridadfs2.png" width="25%" style="padding-top: 10px;"/>
                </center>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Usuario</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Contraseña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" class="descdet" style="padding-right: 23px;">
  <div class="fondo_control">
    
     <br>
    <form action="captchademo.php" method="post">
      <img id="cap" src="captcha.php" width="200" height="60" vspace="3"><br>
      <a href="javascript:actucap();"><span style="padding-right: 45px;">Cambiar código</span><a/><br>
  
    </form>
  </div>
  </td>
  </tr>
</table>
<br>
                        <label for="inputcaptcha" class="col-sm-3 control-label">
                            Código</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tmptxt" id="tmptxt" placeholder="Código de imagen" required>
                        </div>
                    </div>

                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                           <br/>
                            <button type="button" id="val_user" name="val_user" class="btn btn-danger btn-sm" onclick="javascript:valida_usuario();" style="font-size:15px;">
                                Iniciar sesión</button>
                                 <button type="reset" class="btn btn-danger btn-sm" style="font-size:15px;">
                                Limpiar</button>
                        </div>
                    </div>
                    </form>
                </div>
                
        </div>
    </div>
</div>
</form>  
        <center>
        <span style="color:black;">&#169; 2018 Facultad De Sistemas U. A. de C.</span>
        </center>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
   //alert("jQuery esta funcionando !!");
 });
</script>