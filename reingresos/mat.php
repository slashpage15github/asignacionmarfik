<?php
include('sweet_alert/msgAlert_divs.php');

?>
<!DOCTYPE html>
<html>
<head>
<!--  <link rel="stylesheet" href="css/estilo_mat.css">-->

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
    <script src="js/sweetalert.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
    <script src="js/myfunctions_js.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function valida_captcha(){
  var response = grecaptcha.getResponse();

    if(response.length == 0){
        alert("Captcha no verificado");
        return false;
      event.preventDefault();
    } else {
      alert("Captcha verificado");
      return true;
    }</script>
  <script>
var Alert = new CustomAlert();

function actucap(){
var obj=document.getElementById("cap");

if (!obj) obj=window.document.all.cap; //es para IE The document.all property is an array of all the HTML elements that are in the document.
if (obj){
obj.src= "captcha.php?" + Math.random();   //uso de parametro fantasma para evitar cache del navegador
}

}

 

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
    var response = grecaptcha.getResponse();

        
  if (matricula.length==0)   {
      //dialogo_bootstrap('Registre un usuario:','login.php');
     
     swal({
      title:"Alerta: Facultad de Sistemas",
      text:"Registre una matricula, no puede ir vacia, verifique",
      type:"warning",
      icon:"error",
      timer:10000
     }) 
     return false;
    }

    else if(response.length == 0){
       swal({
      title:"Alerta: Facultad de Sistemas",
      text:"Favor de verificar el captcha",
      type:"warning",
      icon:"error",
      timer:10000
     }) 
      return false;
     
    }
    else if (matricula.length<7){
      swal({
      title:"Alerta: Facultad de Sistemas",
      text:"Registre una matricula correcta, verifique (rango de 7 a 8 caracteres)",
      type:"warning",
      icon:"error",
      timer:10000
     }) 
      return false;
    }
     else if (matricula.length>=9){
      swal({
      title:"Alerta: Facultad de Sistemas",
      text:"Registre una matricula correcta, verifique (rango de 7 a 8 caracteres)",
      type:"warning",
      icon:"error",
      timer:10000
     })
      return false;
    }
    else if (capt.length==0){
      //dialogo_bootstrap('Registre su password:','login.php');
      swal({
      title:"Alerta: Facultad de Sistemas",
      text:"Registre el código de seguridad, no puede ir vacío, verifique",
      type:"warning",
      icon:"error",
      timer:10000
     })
     return false;
    }    

    else {
            $('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');

       var datos={matricula:matricula,capt:capt};
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
<style>
h1,label{
color:black;
}
</style>
</head>

<body>
<?php
//session_start();
if (!isset($_SESSION['usuario']))
include('menu.php');
else
include('../menu_privado.php');
?>

<CENTER> 
  

<div class="container">
  
  <form class="form-signin" name="login" action="reg.php" method="post" accept-charset="utf-8" onsubmit="return valida_usuario(); valida_captcha();">

<div class="row" style="margin-top: 0px">
            <div class="col-md-2">
                <IMG SRC = "images/UAdeC.png" width="150px" align="right"/>
            </div> 
            <div class="col-md-8">
            <h1 class="text-center">Solicitud de Reingreso</h1>
            </div>
            <div class="col-md-2" >
                <IMG SRC = "images/logo2.png" width="150px"/>
            </div>
</div>

<div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-lock"></span>Alumno</div>
              <center>
                <IMG SRC = "images/seguridadfs2.png" width="25%" style="padding-top:
                 10px;"/>
              </center>
<form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Matricula</label>
                      <div class="col-sm-9">
                        <input type="text" pattern="[0-9]{7,8}" class="form-control" id="imatricula" maxlength="8" autocomplete="off" name="imatricula" placeholder="INGRESA TU MATRICULA" title="Se requiren formato númerico de entre 7 y 8 dígitos">
                      </div>
                  </div>

            
                  
                  <div class="form-group">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" class="descdet" >
                        <div class="fondo_control">
                        <div class="g-recaptcha" data-sitekey="6LcUp24UAAAAAIMbz4GVp_jIvYJG_0UN4DCrlVXA" data-callback="enabledSubmit"></div>
                        </div>
                         </td>
                      </tr>
                    </table>
                    <br>
                        

                         <div class="form-group last">
                    <div class="col-sm-12">
                      <br/>
                      <input type="SUBMIT" id="val_user" name="val_user" class="btn btn-danger btn-sm" value="Iniciar sesion" onclick="valida_usuario();" style="font-size:15px;"></a>
                      <button type="reset" class="btn btn-danger btn-sm" style="font-size:15px;">Limpiar</button>
                      <br/><br/>
                    
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