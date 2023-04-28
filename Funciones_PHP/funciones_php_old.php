<?php

function login_errors($id_error)
{
    switch ($id_error)
		{
		case 0: $msg_error = "Acceso denegado (usuario o contraseña incorrectos), vuelva a intentar.";
		break;
		case 1: $msg_error = "No ha escrito correctamente el código (caracteres) de seguridad mostrados en la imagen, vuelva a intentar.";
		break;
		case 2: $msg_error = "Su cuenta de usuario no está activada o autorizada, póngase en contacto con el administrador.";
		break;

		}
			echo ('<script language="Javascript">');
			echo ('window.alert("' . $msg_error . '");');
			echo ('history.back();');
			echo ('</script>');

}



function mensajes($id_error)
{
    switch ($id_error)
		{
		case 0: $msg_error = "La encuesta ya ha sido llenada, usted puede verificarla.";
		break;
		case 1: $msg_error = "Los cambios se realizaron con éxito.";
		break;
		case 2: $msg_error = "No se pudieron realizar los cambios, update invalidó.";
		break;
		case 3: $msg_error = "Esta encuesta ya está asignada al usuario, por favor verifique.";
		break;
		case 4: $msg_error = "Esta encuesta no se puede quitar de la asignación al usuario porque tiene respuestas contestadas, verifique por favor.";
		break;
		case 5: $msg_error = "No pude registrar la fecha de último acceso, verifique por favor.";
		break;
		}
			echo ('<script language="Javascript">');
			echo ('window.alert("' . $msg_error . '");');
			echo ('</script>');

}

function mensajes_menu($id_error)
{
    switch ($id_error)
		{
		case 0: $msg_error = "No se puede realizar este movimiento ya que el nodo padre tiene dependencias y estas se perderán, necesita quitar las dependencias para poder mover.";
		break;
		case 1: $msg_error = "Los cambios se realizaron con éxito.";
		break;
		case 2: $msg_error = "No se pudieron realizar los cambios, update invalidó.";
		break;
		}
			echo ('<script language="Javascript">');
			echo ('window.alert("' . $msg_error . '");');
			echo ('</script>');

}

  function is_email_valid($email)
  {
  	if(eregi("^[a-z0-9._-]+@+[a-z0-9._-]+.+[a-z]{2,3}$", $email)) return TRUE;
  	else return FALSE;
  }

  function prueba()
  {
  for ($i="a" ; $i<"n" ; $i++)
  {
    echo $i;
}
   }



function saca_menu_desplegable($sentencia,$valor,$nombre,$id_valor)
{
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("asignacionfs_db", $conexion);

$cogidovalor=0;
echo "<select name=$nombre id=$id_valor>";
$resultado=mysql_query($sentencia) or die (mysql_error());
while ($fila=mysql_fetch_row($resultado))
{
 	  if ($fila[0]==$valor)
	  	{
		 	echo "<option selected value='$fila[0]'>$fila[1]";
			$cogidovalor=1;
		}
		else
		{
		 	echo "<option value='$fila[0]'>$fila[1]</option>";
		}
}// fin del while

if ($cogidovalor==0)
{
echo '<option value="-1" selected>Selecciona:</option>';
}

echo "</select>";
mysql_close ($conexion);
}



function saca_menu_desplegable_array($arreglo_values,$arreglo_texts,$valor,$nombre,$id_valor)
{
if ($valor=='')	 //como valor estaba indefinodo , entraba a la condicion
	{
	$valor=9999;
	}

$cogidovalor=0;
echo "<select name=$nombre id=$id_valor>";
	 for($a=0;$a<count($arreglo_values);$a++)
	  {
			if ($arreglo_values[$a]==$valor)
				{
					echo "<option selected value='$arreglo_values[$a]'>$arreglo_texts[$a]";
					$cogidovalor=1;
				}
				else
				{
					echo "<option value='$arreglo_values[$a]'>$arreglo_texts[$a]</option>";
				}
		}

if ($cogidovalor==0)
	{
		echo '<option value="-1" selected>Selecciona:</option>';
	}

	echo "</select>";
}


function saca_menu_desplegable_array_onchange($arreglo_values,$arreglo_texts,$valor,$nombre,$id_valor)
{
if ($valor=='')	 //como valor estaba indefinodo , entraba a la condicion
	{
	$valor=9999;
	}

$cogidovalor=0;
echo "<select name=$nombre id=$id_valor onchange='fun();'>";
	 for($a=0;$a<count($arreglo_values);$a++)
	  {
			if ($arreglo_values[$a]==$valor)
				{
					echo "<option selected value='$arreglo_values[$a]'>$arreglo_texts[$a]";
					$cogidovalor=1;
				}
				else
				{
					echo "<option value='$arreglo_values[$a]'>$arreglo_texts[$a]</option>";
				}
		}

if ($cogidovalor==0)
	{
		echo '<option value="-1" selected>Selecciona:</option>';
	}

	echo "</select>";
}


function input_texto($type,$name,$id,$size,$maxlength)
{
//echo "<select name=$nombre id=$id_valor>";
echo "<input type=$type name=$name id=$id size=$size maxlength=$maxlength>";
}

function input_texto_fecha($type,$name,$id,$size,$maxlength,$readonly)
{
//echo "<select name=$nombre id=$id_valor>";
echo "<input type=$type name=$name id=$id size=$size maxlength=$maxlength readonly=$readonly>";
}

function input_radio($type,$name,$value,$text)
{

	foreach($text as $indice_texto=>$valor_texto)
		{
			//echo $indice_texto;
			foreach($value as $indice_value=>$valor_value)
			 	{
				 if ($indice_texto==$indice_value)
				 	{
						$valor_de_radio='"'.$valor_value.'"';
					}
				}
			echo "<input type=$type name=$name value=$valor_de_radio>$valor_texto<br>";
		}
}


function input_radio2($type,$name,$value,$text)
{
			echo "<input type=$type name=$name value=$value>$text";
}

function input_check($type,$name,$value,$text)
{
			echo "<input type=$type name=$name value=$value>$text";
}

function ctl_calendario($ids,$name)
{
	echo '<input type="button" value="..."  name='.'"'.$name.'"'.' onClick="return showCalendar('."'".$ids."'".","."'"."dd/mm/y"."');".'">';

}

function limpia_calendario($ids,$name)
{
	echo '<input type="button" value="Limpiar"   name='.'"'.$name.'"'.' onclick="cleanCalendar('."'".$ids."'".');">';

}


function array2json($arr) {
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr)-1;
    if(($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
        $is_list = true;
        for($i=0; $i<count($keys); $i++) { //See if each key correspondes to its position
            if($i != $keys[$i]) { //A key fails at position check.
                $is_list = false; //It is an associative array.
                break;
            }
        }
    }

    foreach($arr as $key=>$value) {
        if(is_array($value)) { //Custom handling for arrays
            if($is_list) $parts[] = array2json($value); /* :RECURSION: */
            else $parts[] = '"' . $key . '":' . array2json($value); /* :RECURSION: */
        } else {
            $str = '';
            if(!$is_list) $str = '"' . $key . '":';

            //Custom handling for multiple data types
            if(is_numeric($value)) $str .= $value; //Numbers
            elseif($value === false) $str .= 'false'; //The booleans
            elseif($value === true) $str .= 'true';
            else $str .= '"' . addslashes($value) . '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

            $parts[] = $str;
        }
    }
    $json = implode(',',$parts);

    if($is_list) return '[' . $json . ']';//Return numerical JSON
    return '{' . $json . '}';//Return associative JSON
}

function borrado_de_encuesta_mysql($vengo_de_actualiza)
{
 		// borrado de datos de oprespuestas
		$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
		mysqli_autocommit($conn, FALSE);

 				$query_delete='delete from oprespuestas where IDEncuesta='.$_SESSION['g_encuesta'].' and ' .'IDUsuario='.$_SESSION['g_idusuario'];
				$result = mysqli_query($conn, $query_delete);

					if (mysqli_affected_rows($conn)>0)
						{
							$respuestas_afectadas=mysqli_affected_rows($conn);
										if ($vengo_de_actualiza==false)
											{
												$var_pregunta_actual=0;
												$date_blanco='';
												$query_update_p_actual='update accesos set IDPreguntaActual='.$var_pregunta_actual.',dteFinalizada="'.$date_blanco.'" where IDUsuario='.$_SESSION['g_idusuario'].' and IDEncuesta='.$_SESSION['g_encuesta'].'';
												$result_pregunta_actual = mysqli_query($conn, $query_update_p_actual);
												//echo $query_update_p_actual;
												//exit;
											}
											else
											{
												$result_pregunta_actual = TRUE;
											}



							if ($result != TRUE && $result_pregunta_actual != TRUE)
								{
									$sw_commit=0;
								}
								else
								{
									$sw_commit=1;
								}

 									if ($sw_commit==1)
										{
	  	 									mysqli_commit($conn);
												if ($vengo_de_actualiza==false)
													{
														echo 'La encuesta se borró correctamente, respuestas afectados: '.$respuestas_afectadas."<br/>";
 														echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';
													}
										}
										else
										{
    										mysqli_rollback($conn);  // if error, roll back transaction
											echo 'Falló el borrado'."<br/>";
												if ($vengo_de_actualiza==false)
													{
														echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';
													}
										}
						}
					  	else
						{
						echo 'No tiene caso hacer transacción, no hay registros para borrar.';
						}
 		// close connection
		mysqli_close($conn);

}

function borrado_de_encuesta_mysql_pagina($vengo_de_actualiza)
{
				$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
				$db->connect();

				$sql_respuestas="SELECT oprespuestas.IDRespuesta,oprespuestas.IDEncuesta,oprespuestas.IDPregunta,mensajes.IDMensaje,replace(mensajes.strMensaje,',','&') strMensaje,replace(oprespuestas.strValor,',','&') strValor,respuestas.intTipoR	".
				"FROM respuestas Inner Join mensajes ON respuestas.IDMensaje = mensajes.IDMensaje Inner Join oprespuestas ON respuestas.IDRespuesta = oprespuestas.IDRespuesta ".
				"AND oprespuestas.IDEncuesta = respuestas.IDEncuesta AND oprespuestas.IDPregunta = respuestas.IDPregunta ".
				"JOIN (SELECT e.IDPregunta from encuestas e where e.IDEncuesta=".$_SESSION['g_encuesta']. " order by e.IDPregunta,e.IDMensaje limit ".$_SESSION['sw_ultima_pregunta'].",".$_SESSION['intmaximo'].") as e  ON (respuestas.IDPregunta=e.IDPregunta) ".
				"WHERE oprespuestas.IDEncuesta=".$_SESSION['g_encuesta']." and oprespuestas.IDUsuario=".$_SESSION['g_idusuario']." ORDER BY oprespuestas.IDPregunta ASC,mensajes.IDMensaje ASC";

   //echo $sql_respuestas;
   //exit;
 $rows_respuestas = $db -> query($sql_respuestas);


 $i=0;
while($row_respuesta=$db->fetch_array($rows_respuestas))
{
  $r_idrespuesta=trim($row_respuesta["IDRespuesta"]);
  $r_idencuesta=trim($row_respuesta["IDEncuesta"]);
  $r_idpregunta=trim($row_respuesta["IDPregunta"]);
  $r_idmensaje=trim($row_respuesta["IDMensaje"]);
  $r_strmensaje=trim($row_respuesta["strMensaje"]);
  $r_strvalor=trim($row_respuesta["strValor"]);
  $r_inttipor=trim($row_respuesta["intTipoR"]);


  $array_respuestas[$i]=array('num'=>$i,'idrespuesta'=>$r_idrespuesta,
							'idencuesta'=>$r_idencuesta,
							'idpregunta'=>$r_idpregunta,
							'idmensaje'=>$r_idmensaje,
							'strmensaje'=>$r_strmensaje,
							'strvalor'=>$r_strvalor,
							'inttipor'=>$r_inttipor,
							);

  $i++;
}


	/*	for($a=0;$a<count($array_respuestas);$a++)
			{
			 echo "num :".$array_respuestas[$a]['num'];
			 echo "idrespuesta :".$array_respuestas[$a]['idrespuesta'];
			 echo "idencuesta :".$array_respuestas[$a]['idencuesta'];
			 echo "idpregunta :".$array_respuestas[$a]['idpregunta'];
			 echo "idmensaje :".$array_respuestas[$a]['idmensaje'];
			 echo "strmensaje :".$array_respuestas[$a]['strmensaje'];
			 echo "strvalor :".$array_respuestas[$a]['strvalor'];
			 echo "inttipor :".$array_respuestas[$a]['inttipor']."<br/>";

			 }
			*/
$db->close();

		//exit;

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
mysqli_autocommit($conn, FALSE);

for($a=0;$a<count($array_respuestas);$a++)
	{

		 		$v_idrespuesta=$array_respuestas[$a]['idrespuesta'];
		 		$v_idencuesta=$array_respuestas[$a]['idencuesta'];
		 		$v_idpregunta=$array_respuestas[$a]['idpregunta'];

				$query_delete='delete from oprespuestas where IDrespuesta='.$v_idrespuesta.' and '.'IDEncuesta='.$v_idencuesta.' and '.'IDPregunta='.$v_idpregunta.' and '.'IDUsuario='.$_SESSION['g_idusuario'];
				//echo $query_delete."<br/>";

				$result = mysqli_query($conn, $query_delete);
					if ($result != TRUE)
						{
							$sw_commit=0;
							break;
						}
						else
						{
							$sw_commit=1;
						}
	}
	//exit;

	if ($sw_commit==1)
		{
	  	 	mysqli_commit($conn);
			if ($vengo_de_actualiza==false)
				{
					echo 'La encuesta por página se borró correctamente'."<br/>";
				}
				else
				{
					//echo 'La Encuesta Se Actualizó Correctamente'."<br/>";
				}
					$modo_encu=$_SESSION['modo_de_encuesta'];
					//header("Location: consulta_encuesta_arrays_pagina.php?admins=0".'&nombre='.$_SESSION['nombre_de_encuesta']);

					//echo '<input type="button" value="Ver Encuesta" onclick="ver_encuesta_llenada('."'$encu'".','."'$modo_encu'".');">';
 					echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';

		}
		else
		{
    		mysqli_rollback($conn);  // if error, roll back transaction
			echo 'Falló el borrado por página en la actualización'."<br/>";
			echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';
		}

// close connection
mysqli_close($conn);
}




function insertado_de_encuesta_mysql($arr_control_de_etiqueta,$arr_control_de_respuesta,$array_labels_respuestas,$arr_control_de_dato,$vengo_de_actualiza,$encu)
{
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
mysqli_autocommit($conn, FALSE);

$date = date("Y-m-d");
for($a=0;$a<count($arr_control_de_etiqueta);$a++)
	{
 		if ($arr_control_de_respuesta[$a]==1)
			{

		 		$v_idrespuesta=$array_labels_respuestas[$a]['idrespuesta'];
		 		$v_idencuesta=$array_labels_respuestas[$a]['idencuesta'];
		 		$v_idpregunta=$array_labels_respuestas[$a]['idpregunta'];
		 		if ($arr_control_de_dato[$a]!='')
					{
						$v_strvalor=$arr_control_de_dato[$a];
					}
					else
					{
						$v_strvalor='';
		 			}


				$query_insert='insert into oprespuestas(IDrespuesta,IDEncuesta,IDPregunta,strValor,IDUsuario,dteFecha) values ('.$v_idrespuesta.','.$v_idencuesta.','.$v_idpregunta.','.'"'.$v_strvalor.'"'.','.$_SESSION['g_idusuario'].',"'.$date.'")';

			if ($vengo_de_actualiza==false)
				{
						$var_pregunta_actual=$_SESSION['total_preguntas'];
						$query_update_p_actual='update accesos set IDPreguntaActual='.$var_pregunta_actual.',dteFinalizada="'.$date.'" where IDUsuario='.$_SESSION['g_idusuario'].' and IDEncuesta='.$v_idencuesta.'';
						$result_pregunta_actual = mysqli_query($conn, $query_update_p_actual);
				}
				else
				{
					$result_pregunta_actual = TRUE;
				}

				$result = mysqli_query($conn, $query_insert);
					if ($result != TRUE && $result_pagina_actual != TRUE)
						{
							$sw_commit=0;
							break;
						}
						else
						{
							$sw_commit=1;
						}
			}
	}

	if ($sw_commit==1)
		{
	  	 	mysqli_commit($conn);
			if ($vengo_de_actualiza==false)
				{
					echo 'La encuesta se grabó correctamente'."<br/>";
				}
				else
				{
					echo 'La encuesta se actualizó correctamente'."<br/>";
				}
					$modo_encu=$_SESSION['modo_de_encuesta'];
					echo '<input type="button" value="Ver encuesta" onclick="ver_encuesta_llenada('."'$encu'".','."'$modo_encu'".');">';
 					echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';

		}
		else
		{
    		mysqli_rollback($conn);  // if error, roll back transaction
			echo 'Falló el Inserta'."<br/>";
			echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';
		}

// close connection
mysqli_close($conn);

}

function insertado_de_encuesta_mysql_pagina($arr_control_de_etiqueta,$arr_control_de_respuesta,$array_labels_respuestas,$arr_control_de_dato,$vengo_de_actualiza,$encu)
{
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
mysqli_autocommit($conn, FALSE);

$date = date("Y-m-d");
for($a=0;$a<count($arr_control_de_etiqueta);$a++)
	{
 		if ($arr_control_de_respuesta[$a]==1)
			{

		 		$v_idrespuesta=$array_labels_respuestas[$a]['idrespuesta'];
		 		$v_idencuesta=$array_labels_respuestas[$a]['idencuesta'];
		 		$v_idpregunta=$array_labels_respuestas[$a]['idpregunta'];
		 		if ($arr_control_de_dato[$a]!='')
					{
						$v_strvalor=$arr_control_de_dato[$a];
					}
					else
					{
						$v_strvalor='';
		 			}


				$query_insert='insert into oprespuestas(IDrespuesta,IDEncuesta,IDPregunta,strValor,IDUsuario,dteFecha) values ('.$v_idrespuesta.','.$v_idencuesta.','.$v_idpregunta.','.'"'.$v_strvalor.'"'.','.$_SESSION['g_idusuario'].',"'.$date.'")';
				//echo $query_insert;echo "<br/>";

			if ($vengo_de_actualiza==false)
				{
							//echo $_SESSION['sw_ultima_pregunta']+$_SESSION['intmaximo']."<br/>";
							//echo $_SESSION['total_preguntas']."<br/>";
							//exit;

						if (($_SESSION['sw_ultima_pregunta']+$_SESSION['intmaximo'])>=$_SESSION['total_preguntas'])
							{
								$var_pregunta_actual=$_SESSION['total_preguntas'];
								$query_update_p_actual='update accesos set IDPreguntaActual='.$var_pregunta_actual.',dteFinalizada="'.$date.'" where IDUsuario='.$_SESSION['g_idusuario'].' and IDEncuesta='.$v_idencuesta.'';
								echo $query_update_p_actual;
								//exit;
							}
							else
							{
								$var_pregunta_actual=$_SESSION['sw_ultima_pregunta']+$_SESSION['intmaximo'];
								$query_update_p_actual='update accesos set IDPreguntaActual='.$var_pregunta_actual.' where IDUsuario='.$_SESSION['g_idusuario'].' and IDEncuesta='.$v_idencuesta.'';
								echo $query_update_p_actual;
								//exit;
							}
					$result_pregunta_actual = mysqli_query($conn, $query_update_p_actual);

				}
				else
				{
					$result_pregunta_actual = TRUE;
				}

				$result = mysqli_query($conn, $query_insert);

					//echo $result."<br/>";
					//echo $result_pregunta_actual."<br/>";
					//exit;

					if ($result != TRUE && $result_pagina_actual != TRUE)
						{
							$sw_commit=0;
							break;
						}
						else
						{
							$sw_commit=1;
						}
			}
	}


	if ($sw_commit==1)
		{
	  	 	mysqli_commit($conn);
			if ($vengo_de_actualiza==false)
				{
					//echo 'La Encuesta Se Grabó Correctamente'."<br/>";
					$modo_encu=$_SESSION['modo_de_encuesta'];
					header("Location: generar_encuesta_arrays_pagina.php?admins=0".'&nombre='.$_SESSION['nombre_de_encuesta']);

				}
				else
				{
					echo 'La encuesta se actualizó correctamente'."<br/>";
					$modo_encu=$_SESSION['modo_de_encuesta'];
					header("Location: consulta_encuesta_arrays_pagina.php?admins=0".'&nombre='.$_SESSION['nombre_de_encuesta']);

				}
		}
		else
		{
    		mysqli_rollback($conn);  // if error, roll back transaction
			echo 'Falló el Inserta'."<br/>";
			echo '<input type="button" value="Menú de encuesta" onclick="ir_menu_encuestas();">';
		}

// close connection
mysqli_close($conn);

}


function describir_bln($valor)
  {
 	 		switch 	($valor)
				{
					case 0:
						$v_bln='Falso';
						break;
					case 1:
						$v_bln='Cierto';
						break;
					default:
						$v_bln='No definido';
						break;
				}
				return $v_bln;
  }

function describir_inttipoe($valor)
  {
 	 		switch 	($valor)
				{
					case 1:
						$v_bln='Ir Adelante';
						break;
					case 2:
						$v_bln='Ir Atras y Adelante';
						break;
					case 3:
						$v_bln='Completa';
						break;
					default:
						$v_bln='No definido';
						break;
				}
				return $v_bln;
  }

  function conteo_de_oprespuestas()
  {

  				$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
				$db->connect();

  	$sql_respuestas_conteo="SELECT count(*) as cuenta_respuestas ".
					"FROM respuestas Inner Join mensajes ON respuestas.IDMensaje = mensajes.IDMensaje Inner Join oprespuestas ON respuestas.IDRespuesta = oprespuestas.IDRespuesta ".
					"AND oprespuestas.IDEncuesta = respuestas.IDEncuesta AND oprespuestas.IDPregunta = respuestas.IDPregunta ".
					"JOIN (SELECT e.IDPregunta from encuestas e where e.IDEncuesta=".$_SESSION['g_encuesta']. " order by e.IDPregunta,e.IDMensaje limit ".$_SESSION['sw_ultima_pregunta'].",".$_SESSION['intmaximo'].") as e  ON (respuestas.IDPregunta=e.IDPregunta) ".
					"WHERE oprespuestas.IDEncuesta=".$_SESSION['g_encuesta']." and oprespuestas.IDUsuario=".$_SESSION['g_idusuario']." ORDER BY oprespuestas.IDPregunta ASC,mensajes.IDMensaje ASC";


$rows_respuestas_conteo = $db -> query($sql_respuestas_conteo);
$i=1;
while($row_respuesta_conteo=$db->fetch_array($rows_respuestas_conteo))
{
  $r_respuesta_conteo=trim($row_respuesta_conteo["cuenta_respuestas"]);
  $i++;
}

$db->close();
return $r_respuesta_conteo;

  }

function porcentaje_total_preguntas($encuesta)
{
				$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
				$db->connect();

				$sql_total_preguntas="select count(*) as total_preguntas from encuestas where IDEncuesta=".$encuesta;
				$rows_total_preguntas = $db -> query($sql_total_preguntas);
				while($row_total_preguntas=$db->fetch_array($rows_total_preguntas))
					{
						$total_preguntas=trim($row_total_preguntas["total_preguntas"]);
					}
				return $total_preguntas;
				$db->close();
}


function porcentaje_total_preguntas_contestadas($encuesta,$usuario)
{
				$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
				$db->connect();

				$sql_total_preguntas_contestadas="select ifnull(IDPreguntaActual,0) as IDPreguntaActual from accesos where IDUsuario=".$usuario." and IDEncuesta=".$encuesta;
				$rows_total_preguntas_contestadas = $db -> query($sql_total_preguntas_contestadas);
				while($row_total_preguntas_contestadas=$db->fetch_array($rows_total_preguntas_contestadas))
					{
						$total_preguntas_contestadas=trim($row_total_preguntas_contestadas["IDPreguntaActual"]);
					}
				return $total_preguntas_contestadas;
				$db->close();
}


?>
