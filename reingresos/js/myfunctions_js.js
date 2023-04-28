function GetTodayDate() {
   var tdate = new Date();
   var dd = tdate.getDate(); //yields day
   var MM = tdate.getMonth(); //yields month
   var yyyy = tdate.getFullYear(); //yields year
   var hrs = tdate.getHours(); //minutos
    var min = tdate.getMinutes();//segundos
    var mili = tdate.getMilliseconds();//mili
   var currentDate= dd + "-" +( MM+1) + "-" + yyyy+"_"+hrs+"_"+min+"_"+mili;

   return currentDate;
}



function lTrim(sStr){
     while (sStr.charAt(0) == " ")
      sStr = sStr.substr(1, sStr.length - 1);
     return sStr;
    }

    function rTrim(sStr){
     while (sStr.charAt(sStr.length - 1) == " ")
      sStr = sStr.substr(0, sStr.length - 1);
     return sStr;
    }

    function allTrim(sStr){
     return rTrim(lTrim(sStr));
    }
/* end functions trim*/

function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "<img  src='css/img/32px-Crystal_Clear_app_help_index.png'/><span style='color:#ad2f2f;'>&nbsp;Alertas</span>:Facultad de Sistemas UAdeC";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button id="btn_alertjs" style="width:80px;height:33px;background:black;color:#fff;border-color:gray;font-size:20px;font-weight:bold;hover:;" onclick="Alert.ok()">OK</button>';
    }
    this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
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


  function limpia_para_nuevo_user()
{
 
  document.getElementById("operacion").value='Ingresar';
  document.getElementById("_id").value='';
  document.getElementById("_usuario").value='';
  document.getElementById("_clave").value='';
  document.getElementById("_nombre_usuario").value='';
  document.getElementById("_tipo_usuario").value='';
   
  

   var select_tipou = document.getElementById("_tipo_usuario");
   select_tipou.options[select_tipou.options.length] = new Option('Selecciona:','-1');
   document.getElementById("_tipo_usuario").selectedIndex=2;

  
  document.getElementById("nuevo").style.visibility="hidden";
  
  document.forma_ingreso.usuario.focus();
  
  
}


function Validate_usuarios_abc()
{
    if ((document.forma_ingreso.usuario.value==null) || (allTrim(document.forma_ingreso.usuario.value).length==0)) 
    {
        alert('Por favor llene el dato de Clave de Usuario Completo!');
        return false;
    }
  
    if ((document.forma_ingreso.nombre_usuario.value==null) || (allTrim(document.forma_ingreso.nombre_usuario.value).length==0)) 
    {
        alert('Por favor llene el dato de Nombre De Usuario!');
        return false;
    }

    if ((document.forma_ingreso.clave.value==null) || (allTrim(document.forma_ingreso.clave.value).length==0)) 
    {
        alert('Por favor llene el dato de password!');
        return false;
    }

  if (document.forma_ingreso.tipo_usuario.value == "-1")
  {
    alert ("Seleccione una Opcion de la lista de Tipo De Usuario");
    return false;
  }
}   

function Validate_salones_abc()
{
    if ((document.forma_ingreso.salon.value==null) || (allTrim(document.forma_ingreso.salon.value).length==0)) 
    {
        alert('Por favor llene el dato de Salon !');
        return false;
    }
  
    if ((document.forma_ingreso.capacidad.value==null) || (allTrim(document.forma_ingreso.capacidad.value).length==0)) 
    {
        alert('Por favor llene el dato de Capacidad!');
        return false;
    }

    if ((document.forma_ingreso.piso.value==null) || (allTrim(document.forma_ingreso.piso.value).length==0)) 
    {
        alert('Por favor llene el dato de Piso!');
        return false;
    }
     if ((document.forma_ingreso.caracteristica.value==null) || (allTrim(document.forma_ingreso.caracteristica.value).length==0)) 
    {
        alert('Por favor llene el dato de Caracteristica!');
        return false;
    }
        }  

    function Validate_materias_dep_abc()
{
    if ((document.forma_ingreso.clave_Materia.value==null) || (allTrim(document.forma_ingreso.clave_Materia.value).length==0)) 
    {
        alert('Por favor llene el dato de Clave de Materia Completo!');
        return false;
    }
  
    if ((document.forma_ingreso.nombre_materia.value==null) || (allTrim(document.forma_ingreso.nombre_materia.value).length==0)) 
    {
        alert('Por favor llene el dato de Nombre De Materia!');
        return false;
    }

    if ((document.forma_ingreso.dia_aplicacion_ord.value==null) || (allTrim(document.forma_ingreso.dia_aplicacion_ord.value).length==0)) 
    {
        alert('Por favor llene el dia de aplicacion ordinario!');
        return false;
    }
    if ((document.forma_ingreso.dia_aplicacion_ext.value==null) || (allTrim(document.forma_ingreso.dia_aplicacion_ext.value).length==0)) 
    {
        alert('Por favor llene el dia de aplicacion extaordinario!');
        return false;
    }
} 

function Validate_eventos()
{
     if (allTrim(document.getElementById('title').value).length==0){
        alert('Error: Escriba un titulo de evento.\nNo debe estar en blanco!.');
        return false;
    }
     if (allTrim(document.getElementById('descripcion').value).length==0){
        alert('Error: Escriba una descripción de evento.\nNo debe estar en blanco!.');
        return false;
    }
     if (document.getElementById('color').value=="0"){
        alert('Error: Seleccione un color para resaltar el evento.');
        return false;
    }
     if (allTrim(document.getElementById('datetimepicker').value).length==0){
        alert('Error: Escriba una fecha de inicio del evento.\nNo debe estar en blanco!.');
        return false;
    }
     if (allTrim(document.getElementById('datetimepicker2').value).length==0){
        alert('Error: Escriba una fecha de fin del evento.\nNo debe estar en blanco!.');
        return false;
    }
}   

function Validate_eventosedita()
{
     if (allTrim(document.edita.title.value).length==0){
        alert('Error edición: Escriba un titulo de evento.\nNo debe estar en blanco!.');
        return false;
    }
     if (allTrim(document.edita.descripcion2.value).length==0){
        alert('Error edición: Escriba una descripción de evento.\nNo debe estar en blanco!.');
        return false;
    }
     if (document.edita.color.value=="0"){
        alert('Error edición: Seleccione un color para resaltar el evento.');
        return false;
    }
     if (allTrim(document.edita.datetimepicker3.value).length==0){
        alert('Error edición: Escriba una fecha de inicio del evento.\nNo debe estar en blanco!.');
        return false;
    }
     if (allTrim(document.edita.datetimepicker4.value).length==0){
        alert('Error edición: Escriba una fecha de fin del evento.\nNo debe estar en blanco!.');
        return false;
    }
}   

function confirmar_borrado(formObj)
{

           if(confirm(" Esta seguro de borrar el registro?  \n Da click en Aceptar .\n\n Si no estas seguro \n Da click en Cancelar.")) 
        {
        return true;
        } 
              else 
        {
               return false;
              }   
}

/* Suprimir el uso de la tecla ENTER en Textarea 
  Autor: John Sánchez Alvarez 
  Este código es libre de usar y modificarse*/ 

//Me permite remplazar valores dentro de una cadena
function str_replace($cambia_esto, $por_esto, $cadena) {
   return $cadena.split($cambia_esto).join($por_esto);
}

//Valida que no sean ingresado ENTER dentro del textarea
function Textarea_Sin_Enter($char, $id){
   //alert ($char);
   $textarea = document.getElementById($id);
   
   if($char == 13){
      $texto_escapado = escape($textarea.value);
      if(navigator.appName == "Opera" || navigator.appName == "Microsoft Internet Explorer") $texto_sin_enter = str_replace("%0D%0A", "", $texto_escapado); 
      else $texto_sin_enter = str_replace("%0A", "", $texto_escapado);
      
      $textarea.value = unescape($texto_sin_enter); 
   }
}