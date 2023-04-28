<?php
include('sweet_alert/msgAlert_divs.php');
?>
<!DOCTYPE html>
<html>
<head>
<!--	<link rel="stylesheet" href="css/estilo_mat.css">-->

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

  <title>UADEC</title>

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
    var matricula=$( "#imatricula" ).val();
    var capt=$( "#tmptxt" ).val();

    if (matricula.length==0)   {
      //dialogo_bootstrap('Registre un usuario:','login.php');
      
     Alert.render('Registre una matricula, no puede ir vacía, verifique.');
     return false;
    }
    else if (matricula.length<=4){
      Alert.render('Registre una matricula correcta, verifique.');
      return false;

    }
     else if (matricula.length>=9){
      Alert.render('Registre una matricula correcta, verifique.');
      return false;

    }

    else if (capt.length==0){
      //dialogo_bootstrap('Registre su password:','login.php');
     Alert.render('Registre el código de seguridad, no puede ir vacío, verifique.');
     return false;
    }    

    else {
            $('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');

       var datos={matricula,capt};
  $.ajax({
              url: 'verifica_matricula.php',
              type: 'POST',
              dataType: 'html',
              data: datos,
              success: function(response){
            
                if(response=="true")
                  {
  
                     //Alert.render("Candidato de desempeño, recargado con éxito.");
                     window.location.href = "reg.php";

                }else{
                      dialogo_bootstrap(response,'mat.php');
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

<body>
<CENTER> 
  
  <h1>REINGRESOS</h1>
  <form class="form-signin" name="login" action="reg.php" method="post" accept-charset="utf-8" onsubmit="return valida_mat();">

<div class="container">
          <div class="row" style="border-style: none;">
          <div class="col-md-4"><img src = "images/uac.gif" width="70px"  style="padding-top: 7px;"/></div>
        </div>

<div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-lock"></span>Administrador</div>
              <center>
                <IMG SRC = "images/seguridadfs2.png" width="25%" style="padding-top:
                 10px;"/>
              </center>
<form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Usuario</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="iusuario" name="iusuario" placeholder="Ingresa usuario" >
                      </div>
                  </div>
                  <div class="form-group">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="right" class="descdet" style="padding-right: 23px;">
                        <div class="fondo_control">
                        <br>
                        
                        </div>
                         </td>
                      </tr>
                    </table>
                    <br>
                     <tr>   <label for="inputcaptcha"></label>
                            <td>Código</td>
                        
                           <td> <input type="text" name="tmptxt" id="tmptxt" placeholder="Código de imagen" required></td>
                        </div>
                         <div class="form-group last">
                    <div class="col-sm-offset-3 col-sm-9">
                      <br/>
                      <input type="SUBMIT" id="val_user" name="val_user" class="btn btn-danger btn-sm" value="Iniciar sesion" onclick="javascript:valida_usuario();" style="font-size:15px;"></a>
                      <button type="reset" class="btn btn-danger btn-sm" style="font-size:15px;">Limpiar</button>
                    
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
<script src="js\functionmat.js" type="text/javascript"></script>
    </body>
  </html>

<script type="text/javascript">
$(document).ready(function() {
 });
</script>