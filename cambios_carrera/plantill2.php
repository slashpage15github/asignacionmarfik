<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
 </head>
 <body>
  <?php include "plantilla.php";?>
  <center>
<H2 align="center">Ingresa tu Matricula</H2>
<form name ="inicio" action="javascript:completar(form);">
<br><br>
<table align="center">
  <tr align="center">
    <td>Matricula:</td>
    <td><input type="text" name="Matricula" id="matricula" size="8"></td>
  </tr>
  <br>
</table>
<table align="center">
  <td>
    <div class="g-recaptcha" aling="center" data-sitekey="6LcQ0JAUAAAAAJuIL9sdtHEuSzNEFX6GHVRCfHKT"></div>
  </td>
  <tr align="center">
    <td><input type="button" onclick="completar(this.form)"  value="INGRESAR"></td>
    
  </tr>
</table>
  </form>
</center>

<script src ="js/function.js" type ="text/javascript"></script>

</body>
</html>