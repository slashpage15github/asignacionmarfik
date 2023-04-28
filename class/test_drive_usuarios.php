<?php
include("class_usuarios_dal.php");
$metodos = new usuarios_dal;
/*
print "<pre>";
print_r($metodos);
print "<pre>";
*/


$u="david";
$c="123";
$existe=$metodos->verify_user($u,$c);
echo 'verifica:'.$u.'-'.$c.' existe en :'.$existe;

$lista_users=$metodos->get_datos_total_usuarios();

if ($lista_users==NULL){
        print "<h2>No se encontraron resultados.</h2><h3>No hay usuarios en la base de datos</h3>";
    }
    else{
 ?>
  <div class="container-fluid"><!--style="border: 1px solid blue;"-->
    <div class="row">
        <div class="col-md-12">
         <table border="1" id="datatables" class="table table-bordered table-hover dataTable" role="grid">

              <thead>
                <tr>
                  <th>
                    usuario
                  </th>
                  <th>
                  password
                  </th>
				</tr>
				</thead>
  
<?php
/*
print "<pre>";
print_r($lista_users);
print "<pre>";
*/	
	echo 'numero de registro(objetos):'.count($lista_users);
	foreach ($lista_users as $key => $value) {
		$usu=$value->getUsuario();
		$pw=$value->getClave();
?>
	<tr>
		<td><?php print $usu;?></td>
		<td><?php print $pw;?></td>
	</tr>
<?php
	}
	?>

    </table>
  </div>
  </div>
  </div>
  <?php
 } // if vacantes are not  nulls
?>