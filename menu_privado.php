<style>
  .dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

nav {
     width: 100%;
     height: 40px;
       background: red; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(left,rgba(255,0,0,0),rgba(255,0,0,1)); /*Safari 5.1-6*/
  background: -o-linear-gradient(right,rgba(255,0,0,0),rgba(255,0,0,1)); /*Opera 11.1-12*/
  background: -moz-linear-gradient(right,rgba(255,0,0,0),rgba(255,0,0,1)); /*Fx 3.6-15*/
  background: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1)); /*Standard*/

        }
.nav a{
    color: white black!important;
    font-size: 1.5em !important;
    }
.nav li{
    padding-right:5px;
   }
</style>

<!-- fixed-top navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index2.php">Inicio</a></li>

            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/log_forma_usuarios_abc.php" id="usuarios">Usuarios</a></li>


           <li class="dropdown">
              <a href="#" id="menu_acciones" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Importar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">


                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index3.php" id="cargaof">Carga Oferta Académica</a></li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index4.php" id="cargaa">Carga Alumnos</a></li>

              </ul>
            </li>

            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/objetivo.php" id="quienes_somos" name="quienes_somos">Objetivo</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/catalogotutoriales.php" id="contactos" name="contactos">Tutorial</a></li>
            <li class="dropdown">
              <a href="#" id="menu_acciones" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Acciones <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">

                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/pre_asignacion.php" id="pre_asignacion">Asignación automática</a></li>


                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Asignación puntual Ord.</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/consulta_grupal_ord.php" id="xcon_ingreso">Grupal</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/consulta_ordi_alumno.php" id="xcon_ingreso">Individual</a></li>
                          </ul>
                        </li>


                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Asignación puntual Ext.</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/consulta_grupal_ext.php" id="xcon_ingreso">Grupal</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/consulta_extra_alumno.php" id="xcon_ingreso">Individual</a></li>
                          </ul>
                        </li>



                <li class="divider"></li>
                <li class="dropdown-header">Análisis</li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_alumno.php" id="halumno">Consultar Alumno</a></li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_maestro.php" id="hmaestro">Consultar Maestro</a></li>

                <li class="divider"></li>
                <li class="dropdown-header">Respuesta a trámites</li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/veranos/admin/index.php" id="halumno">Materias Verano</a></li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/especiales/admin/index.php" id="halumno">Exámenes Especiales</a></li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cambios_carrera/admin.php" id="hmaestro">Cambios de Carrera</a></li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/reingresos/Administrador/buscar_editar_adm.php" id="hmaestro">Reingresos</a></li>
              </ul>
            </li>

<!--begin convocatorias-->

                <li class="dropdown" id="accountmenu">
                    <a role="button" aria-expanded="false" id="convocatoria" class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Alumnos</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/listado_general2.php" id="xcon_ingreso">Listado general</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/2_o_mas_exa_en_dia_ordi.php" id="xcon_ingreso">2 o más exámenes en día Ordi</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/3_o_mas_exa_en_dia.php" id="xcon_ingreso">3 o más exámenes en día Ordi</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/2_o_mas_exa_en_dia_extras.php" id="xcon_ingreso">2 o más exámenes en día Extra</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/3_o_mas_exa_en_dia_extras.php" id="xcon_ingreso">3 o más exámenes en día Extra</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/alumnosinasignar.php" id="xcon_ingreso">Alumnos sin asignar</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/alumnos_no_match_oferta_academica.php" id="xcon_ingreso">Alumnos sin Oferta Académica</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/alumnos_sin_horarios.php" id="xcon_ingreso">Alumnos sin Horarios</a></li>


                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/empalme_horas_ordi_reporte.php" id="xcon_ingreso">Empalme Horas Ordinarios</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/empalme_horas_extra_reporte.php" id="xcon_ingreso">Empalme Horas Extraordinarios</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cantidad_alumnos_materia.php" id="xcon_ingreso">Alumnos Por Materia</a></li>
                          </ul>
                        </li>
                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Maestros</a>
                          <ul class="dropdown-menu">
                          
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/reporte_plantilla_docente.php" id="xcon_ingreso">Plantilla docente(Oferta)</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/reporte_gruposmaestros.php" id="xcon_ingreso">Plantilla docente(Horarios)</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/empalme_salones.php" id="xcon_ingreso">Empalme de horario-salón Oferta</a></li>


                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/empalme_salones_gruposmaestros.php" id="xcon_ingreso">Empalme Grupos Maestros Horarios</a></li>                            

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/grupos_sin_asignar.php" id="xcon_ingreso">Grupos oferta sin asignar</a></li>
                            
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/oferta_sin_alumnos.php" id="xcon_ingreso">Oferta Sin Alumnos</a></li>
                            

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/Oferta_academica_igual_a_0.php" id="xcon_ingreso">Oferta Alumno=0</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/pdf_maestro_all.php" id="xcon_ingreso" target="_blank">Todos los Horarios</a></li>


                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/diferencia_dia_examenes.php" id="xcon_ingreso" target="_blank">Diferencia de dias Exámenes</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/analisis_lunes.php" id="xcon_ingreso" target="_blank">Análisis Lunes Oferta</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/analisis_martes.php" id="xcon_ingreso" target="_blank">Análisis Martes Oferta</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/analisis_miercoles.php" id="xcon_ingreso" target="_blank">Análisis Miércoles Oferta</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/analisis_jueves.php" id="xcon_ingreso" target="_blank">Análisis Jueves Oferta</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/analisis_viernes.php" id="xcon_ingreso" target="_blank">Análisis Viernes Oferta</a></li>

                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/analisis_sabado.php" id="xcon_ingreso" target="_blank">Análisis Sabado Oferta</a></li>

                          </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown" id="accountmenu">
                    <a role="button" aria-expanded="false" id="convocatoria" class="dropdown-toggle" data-toggle="dropdown" href="#">Utilerías<b class="caret"></b></a>
                    <ul class="dropdown-menu">

                    <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/bt-admin/admin/index.php" id="xcon_ingreso" target="_self">Post de Trabajo</a></li>


                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Catálogos</a>
                          <ul class="dropdown-menu">
                         <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/capacidad_aulas.php" id="xcon_ingreso">Capacidad y Aulas</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/log_forma_mat_departamentales_abc.php" id="xcon_ingreso">Materias Departamentales</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/parametros_fecha_examen_nd.php" id="xcon_ingreso">Parámetros ND</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/fecha_examen_depa.php" id="xcon_ingreso">Parámetros MD</a></li>
                          </ul>
                        </li>



                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Dashboards</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/rodas.php" id="xcon_ingreso">Modalidad De Materia</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/entidades.php" id="xcon_ingreso">Entidades Principales</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/D.php" id="xcon_ingreso">Análisis alumnos-grupos</a></li>
                          </ul>
                        </li>


                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Respaldar</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/en_construccion.php" id="xcon_ingreso">Oferta Académica</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/en_construccion.php" id="xcon_ingreso">Alumnos</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/en_construccion.php" id="xcon_ingreso">Horarios</a></li>
                          </ul>
                        </li>



                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Exportar</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/en_construccion.php" id="xcon_ingreso">Oferta Académica</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/en_construccion.php" id="xcon_ingreso">Alumnos</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/en_construccion.php" id="xcon_ingreso">Horarios</a></li>
                          </ul>
                        </li>
                    </ul>
                </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">








            <?php if(isset($_SESSION['usuario'])){?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo strtoupper($_SESSION['usuario']);?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cerrar_sesion.php" id="salir">Cerrar sesión</a></li>
              </ul>
            </li>
            <?php } ?>



          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <script>
   var root = document.location.origin;
    var menutext='';//variable global
    var tablero_ni=null;
    var tablero_promocion=null;
    var est_tablero_promocion=null;
     //this method give the name the opcion in navbar
    $('.dropdown-menu li a').click(function(){
    $menutext=($(this).text());

/*
      if ($menutext==""){

      }

*/


    });

    //$('.navbar-nav li a').click(function(){
    //alert($(this).text());
   // });







  $('.dropdown-menu li a').click(function(){
    menutext=($(this).text().toUpperCase());
    //alert(menutext);
});

$("#quienes_somos").click(function(e) {
window.clearInterval(tablero_ni);
window.clearInterval(tablero_promocion);
window.clearInterval(est_tablero_promocion);
//alert(document.location.origin);



//$(location).attr('href',root+'/spdcoahuila/index.php');
//window.location.replace(root+"/spdcoahuila/index.php");


  $("#slider").css("display","none");
    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/public/quienes_somos.php',function() {
    /* Act on the event */
  });


});


//convocatria ingreso carga jquery
$("#con_ingreso").click(function(e) {
  window.clearInterval(tablero_ni);
  window.clearInterval(tablero_promocion);
  window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");

    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/public/convocatoria_en_breve.php',function() {
    /* Act on the event */
  });
});


//convocatria promocion carga jquery
$("#con_promocion").click(function(e) {
  window.clearInterval(tablero_ni);
  window.clearInterval(tablero_promocion);
  window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");

    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/public/convocatoria_en_breve.php',function() {
    /* Act on the event */
  });
});



//contactos carga jquery
$("#contactos").click(function(e) {
  window.clearInterval(tablero_ni);
  window.clearInterval(tablero_promocion);
  window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");

    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/public/contactos.php',function() {
    /* Act on the event */
  });
});

//preguntas frecuentes carga jquery
$("#preguntas_frecuentes").click(function(e) {
  window.clearInterval(tablero_ni);
  window.clearInterval(tablero_promocion);
  window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");
    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/public/preguntas_frecuentes.php',function() {
    /* Act on the event */
  });
});

//anexo_cotejo carga jquery
$("#anexo_cotejo").click(function(e) {
window.clearInterval(tablero_ni);
window.clearInterval(tablero_promocion);
window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");
    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/public/login_anexo_cotejo.php',function() {
    /* Act on the event */
  });
});

//documentos carga jquery
//setInterval(function(){
 //   $('#documentos').trigger('click');
//}, 5000);

$("#avance_ingreso").click(function(e) {
  //if (tablero_promocion==true){
  window.clearInterval(tablero_promocion);
  window.clearInterval(est_tablero_promocion);
  window.clearInterval(tablero_ni);
  //}
  $("#slider").css("display","none");
    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron2.php',function() {
  /* Act on the event */
  });

 $("#contentplace").load('bootstrap_3_3_5/template/public/accion_tablero_ingreso.php',function() {
    });
    tablero_ni=setInterval(function(){
  $("#contentplace").load('bootstrap_3_3_5/template/public/accion_tablero_ingreso.php',function() {
    /* Act on the event */
  });
}, 3000);
});



$("#avance_promocion").click(function(e) {
   window.clearInterval(tablero_ni);
   window.clearInterval(est_tablero_promocion);
   window.clearInterval(tablero_promocion);
  $("#slider").css("display","none");
    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron2.php',function() {

  });

 $("#contentplace").load('bootstrap_3_3_5/template/public/accion_tablero_promocion.php',function() {
    });
    tablero_promocion=setInterval(function(){
  $("#contentplace").load('bootstrap_3_3_5/template/public/accion_tablero_promocion.php',function() {

  });
}, 3000);
});



$("#avance_promocion_est").click(function(e) {
   window.clearInterval(tablero_ni);
   window.clearInterval(tablero_promocion);
   window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");
    $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron2.php',function() {

  });

 $("#contentplace").load('bootstrap_3_3_5/template/public/accion_tablero_promocion_est.php',function() {
    });
    est_tablero_promocion=setInterval(function(){
  $("#contentplace").load('bootstrap_3_3_5/template/public/accion_tablero_promocion_est.php',function() {

  });
}, 3000);
});




//ingreso carga jquery
$("#ingreso").click(function(e) {
window.clearInterval(tablero_ni);
window.clearInterval(tablero_promocion);
window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");

  $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron2.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/private/ingreso_menu.php',function() {
    /* Act on the event */
  });
});

//promocion carga jquery
$("#promocion").click(function(e) {
window.clearInterval(tablero_ni);
window.clearInterval(tablero_promocion);
window.clearInterval(est_tablero_promocion);
  $("#slider").css("display","none");

  $("#banner").load('bootstrap_3_3_5/template/banner_jumbotron2.php',function() {
  /* Act on the event */
  });

  $("#contentplace").load('bootstrap_3_3_5/template/private/promocion_menu.php',function() {
    /* Act on the event */
  });
});
</script>
     <!-- Navigation
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/log_forma_usuarios_abc.php" id="usuarios">Usuarios</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/respaldo.php" id="respaldar">Respaldar Archivos</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index3.php" id="cargaof">Carga Oferta Academica</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index4.php" id="cargaa">Carga Alumnos</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/pre_asignacion.php" id="asignacion">Asignacion</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/vprevia.php" id="vprevia">Vista Previa</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cerrar_sesion.php" id="cerrar">Cerrar Sesión</a>
            </div>

        </div>-->
        <!-- /.container -->
    <!--</nav>-->
    <!-- /.end nav -->
      </div>
    </nav>
