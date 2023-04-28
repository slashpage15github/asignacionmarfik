<?php include("/php/class/class_registro_dal.php"); ?>
<script>
function mostrarOcultarTablas(id){
mostrado=0;
elem = document.getElementById(id);
if(elem.style.display==’block’)mostrado=1;
elem.style.display=’none’;
if(mostrado!=1)elem.style.display=’block’;
}
</script>

<div id=”tabla1″ style=”display: none”>

<img src="images/logo.png">

</div>

<div id=”tabla2″ style=”display: none”>

<?php



$obj_lista_registro=new class_registro_dal;
$total_registros=$obj_lista_registro->contar_contenido();

if ($total_registros==0){
        print "<section><h2>No se encontraron resultados.</h2><h3>No hay registros con esa matricula</h3></section>";
    }
    else{

$maxreg = 5;
 
if (!isset($_GET['page'])){
	$pag=1;
}
else{
$pag = $_GET['page'];
}

if(!isset($pag) || empty($pag)){
  
      $min = 0;
      $pag = 1;  
  
}else{
  
      if($pag == 1){
  
            $min = 0;
  
      }else{
  
            $min = $maxreg * $pag;
            $min = $min - $maxreg;
        }
}

include_once '/php/class/class.AutoPagination.php';
$obj = new AutoPagination($obj_lista_registro->contar_contenido(), $pag); 

$obj_lista_registro->mostrar_contenido($min,$maxreg);

echo $obj->_paginateDetails();


    }
?>

</div>

<a href=”javascript:mostrarOcultarTablas(‘tabla1’)”>Mostrar tabla 1</a>

<a href=”javascript:mostrarOcultarTablas(‘tabla2’)”>Mostrar tabla 2</a>