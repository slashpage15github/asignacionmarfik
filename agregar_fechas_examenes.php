<?php 
session_start();
include('protected_sesion.php');
//echo $_SESSION['usuario'];
echo $_SESSION['tipou'];
if ($_SESSION['tipou']==1){
	echo "<script>";
	echo "alert('Esta seccion es solo para usuarios tipo Administrador');";
	echo "window.history.back();";
	echo "</script>";
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Movimientos a Usuarios en General
</title>
</head>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/bootstrap-dialog.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">

    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
<!--<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">-->
		<script src="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/js/myfunctions_js.js"></script>

<body>
<?php
if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>


    <!-- Page Content -->
     <div class="container">
       <div class="row">
          <div class="col-md-3 pull-left">
             <IMG SRC = "images/logo.png"/>
         </div>
         <div class="col-md-3 pull-right">
             <IMG SRC = "images/UAdeC.png"/>
         </div>
     </div>
     <div class="row">
      <div class="col-lg-12 text-center">
         <h1 class="sinMargen">Calendario Sistemas UAdeC: Control Usuarios</h1>
         <div id="calendar" class="col-centered">
         </div>
         <div id="img-out"></div>
     </div>
    </div>

<?php
include ("./Funciones_PHP/funciones_php.php");
include_once ("log_clase_usuarios_abc.php"); // incluye las clases

	$_idusuario="";
	$_usuario="";
	$_clave="";
	$_nombre_usuario="";
	$_tipo_usuario="";

	$usuario="";

if (isset($_GET['md'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{
	
//print "voy a modificar";exit;
	$o_usuario=new Usuario($_GET['md']);  // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
	$_usuario=$o_usuario->getUsuario();		// obtengo el nombre
	$_clave=$o_usuario->getClave();	// obtengo el apellido
	$_nombre_usuario=$o_usuario->getNombre_usuario();		// obtengo la fecha de nacimiento
	$_tipo_usuario=$o_usuario->getTipo_usuario();			// obtengo su peso


	$_idusuario=$o_usuario->getIDUsuario();				// obtengo el id

}

// asignacion de pagina para quese quede en la misma al actualizar
if (isset($_GET['_pagi_pg']))
{
$_pagi_pg=$_GET['_pagi_pg'];
//echo "cuando existe".$_pagi_pg;
}
else
{
$_pagi_pg=1;
//echo "cuando  NO existe".$_pagi_pg;
}
?>
<div >
<form method="POST" action="log_forma_usuarios_abc.php" name="forma_ingreso" onsubmit="return Validate_usuarios_abc();">
<input type="hidden" name="id" id="_id" value="<?php print $_idusuario ?>">
<input type="hidden" name="pagina" value="<?php print $_pagi_pg ?>">

<center>
<table border="0" class="table table-hover">

<tr>
	<td>Clave de Usuario:</td>
	<td><input type="text" name="usuario" id="_usuario" value="<?php print $_usuario ?>" size="30" maxlength="15"></td>
</tr>
<tr>
	<td>Nombre de Usuario:</td>
	<td><input type="text" name="nombre_usuario" id="_nombre_usuario" value = "<?php print $_nombre_usuario ?>" size="80" maxlength="60"></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="text" name="clave" id="_clave" value = "<?php print $_clave ?>" size="30" maxlength="15"></td>
</tr>

<tr>
	<td>Tipo Usuario:</td>
	<td>
		 <?php
		 	$consulta="select id, descripcion from tipo_usuarios order by id";
			saca_menu_desplegable($consulta,$_tipo_usuario, 'tipo_usuario','_tipo_usuario');
		 ?>
	</td>

</tr>

<tr>
	<td></td>
	<td align =right><input type="submit" id="operacion" name="submit" value ="<?php if(is_numeric($_idusuario)) print "Modificar"; else print "Ingresar";?>" class="btn btn-danger">
	<input type="button" id="nuevo" value="Nuevo Usuarios" onclick="limpia_para_nuevo_user();" class="btn btn-danger">
	<!--
	<input type="button" id="menu" value="Ver Calendario" onclick="window.location.href = 'index.php';" class="btn btn-danger">
-->
	</td>

</tr>
</table>
</center>
</form>
</div>
<?php
if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
/*	
print "usuario:".$_POST['usuario'].'<br/>';
print "nombre_usuario:".$_POST['nombre_usuario'].'<br/>';
print "clave:".$_POST['clave'].'<br/>';
print "tipo usuario:".$_POST['tipo_usuario'].'<br/>';

exit;
*/	
	$o_usuario=new Usuario();
	$o_usuario->setUsuario($_POST['usuario']); // setea los datos
	$o_usuario->setNombre_usuario($_POST['nombre_usuario']);
	$o_usuario->setClave($_POST['clave']);
	$o_usuario->setTipo_usuario($_POST['tipo_usuario']);


	print " Consulta ejecutada: ". $o_usuario->insertUsuario(); // inserta y muestra el resultado
}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
//print "modificando";exit;

	$_pagi_pg=trim($_POST['pagina']);

	$o_usuario=new Usuario($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$o_usuario->setUsuario($_POST['usuario']); // setea los datos nuevos
	$o_usuario->setNombre_usuario($_POST['nombre_usuario']);
	$o_usuario->setClave($_POST['clave']);
	$o_usuario->setTipo_usuario($_POST['tipo_usuario']);

	print " Consulta ejecutada: ". $o_usuario->updateUsuario(); // inserta y muestra el resultado

    //header("Location: log_forma_usuarios_abc.php?_pagi_pg=$_pagi_pg");
	//exit;

}

if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{


	$usuario=new Usuario();
	print " Consulta ejecutada: ". $usuario->deleteUsuario($_GET['br']); // elimina el cliente y muestra el resultado

	//header("Location: log_forma_usuarios_abc.php?_pagi_pg=$_pagi_pg");
}


				require("log_database.class.php");

				$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
				$db->connect();





//Sentencia sql (sin limit)
//$_pagi_sql = 'SELECT * FROM usuarios WHERE blnActivo='."'".$_SESSION['g_roles']."'".' ORDER BY Name';
$_pagi_sql ='select u.IDUsuario,u.usuario, u.clave, u.nombre_usuario, u.tipo_usuario,t.descripcion  
FROM usuarios u Inner Join tipo_usuarios t ON u.tipo_usuario = t.id';

//echo $_pagi_sql;exit;

//cantidad de resultados por página (opcional, por defecto 20)
$_pagi_cuantos = 10;//Elegí un número pequeño para que se generen varias páginas

//cantidad de enlaces que se mostrarán como máximo en la barra de navegación
$_pagi_nav_num_enlaces = 5;//Elegí un número pequeño para que se note el resultado

//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true sólo en tiempo de desarrollo.

//Si tenemos una consulta compleja que hace que el Paginator no funcione correctamente,
//realizamos el conteo alternativo.
$_pagi_conteo_alternativo = true;//recomendado false.

//Supongamos que sólo nos interesa propagar estas dos variables
$_pagi_propagar = array("status","termino");//No importa si son POST o GET

//Definimos qué estilo CSS se utilizará para los enlaces de paginación.
//El estilo debe estar definido previamente
$_pagi_nav_estilo = "btn btn-danger";

//definimos qué irá en el enlace a la página anterior
$_pagi_nav_anterior = "&lt;";// podría ir un tag <img> o lo que sea	 ="<img src=\"flecha_anterior.gif\">";

//definimos qué irá en el enlace a la página siguiente
$_pagi_nav_siguiente = "&gt;";// podría ir un tag <img> o lo que sea

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente
include("paginator.inc.php");

//Leemos y escribimos los registros de la página actual
print '<br/>
<div class="row">
<div class="col-md-2">
</div>

<div class="col-md-8">
<div id=ilumina_renglon><center><table border="0"  class="table table-hover">'
		  .'<tr bgcolor="#ff9999"><td>Usuario</td>'
		  .'<td>clave</td>'
		  .'<td>Nombre Completo Usuario</td>'
		  .'<td>Tipo De Usuario</td>'
		  .'<td>Modificar</td>'
		  .'<td>Borrar</td></tr>';

while($row = mysql_fetch_array($_pagi_result)){



 print '<tr>'
		  .'<td>'.$row['usuario'] .'</td>'
		  .'<td>'.$row['clave'] .'</td>'
		  .'<td>'.$row['nombre_usuario'] .'</td>'
		  .'<td>'.$row['tipo_usuario'].':'.$row['descripcion'].'</td>'
		  .'<td><a href="log_forma_usuarios_abc.php?md='.$row['IDUsuario'].'&_pagi_pg='.$_pagi_pg.'"><img src="pics/modificar.png" border="0" style="position:relative;left:12px;"></a></td>'   // en este ejemplo para simplificar se envian los parametros por get utilizando un href
		  .'<td><a href="log_forma_usuarios_abc.php?br='.$row['IDUsuario'].'&_pagi_pg='.$_pagi_pg.'" onclick="return confirmar_borrado(this);"><img src="pics/borrar.png" border="0" style="position:relative;left:4px;"></a></td>'		// lo correcto seria enviarlos por post con un submit por ejem.
		  .'</tr>';
}
echo '</table></center></div></div></div>';
//Incluimos la barra de navegación

if ($_pagi_totalReg>$_pagi_cuantos) {//Incluimos la barra de navegación si el "total de resultados" es mayor que el la cantidad de "resultados por página"
echo"<p><center>".$_pagi_navegacion."</p>";}

//Incluimos la información de la página actual
echo"<p>Mostrando Usuarios ".$_pagi_info."</center></p>";

$cerrar=new sQuery();
$cierra_conexion= $cerrar->Close();
?>
<SCRIPT LANGUAGE="JavaScript">

  if (document.getElementById("operacion").value=='Modificar')
  {
  	//alert(document.getElementById("operacion").value);
	document.getElementById("nuevo").style.visibility="visible";
	}
	else
	{
	document.getElementById("nuevo").style.visibility="hidden";
	}

	//var propiedad=document.getElementById("nuevo").style;
		//propiedad.color="navy";

</SCRIPT>
</body>
</html>