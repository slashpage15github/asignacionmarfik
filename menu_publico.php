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
    background-color: black;
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
    background-color: black;
}



/*********/
.navbar {
      margin-bottom: 0;
      background-color: black;
      z-index: 9999;
      border: 0;
      font-family: Verdana, sans-serif;
      font-size: 18px !important;
      letter-spacing:1px;
      border-radius: 0;
    }
    
    .navbar li a,
    .navbar .navbar-brand {
      color: #FFFFFF !important;
      background: black;
    }
    
    .navbar-nav li a:hover,
    .navbar-nav li.active a {
      color: white !important;
      background-color: red !important;

    }
    
    .navbar-default .navbar-toggle {
      border-color: transparent;
      



    }

.dropdown-menu{
  background: black;
  font-size: 16px !important;
}

  #hamburger .icon-bar {
    color: white;
      background: red;


    }
    
    #hamburger:hover,
    #hamburger.is-active {
      color: red;
      background: #F4511e !important;

    }
    
    #hamburger:hover .icon-bar,
    #hamburger.is-active .icon-bar {
      background: white !important;
color: red;
    }
    
    #hamburger:focus {
      background: black;
color: white;
    }
    
    #hamburger:focus .icon-bar {
      background: white;
      color: red;
    }

</style>

<!-- fixed-top navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" id="hamburger">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           </div>

      
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index.php">Inicio</a></li>

            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/presentacion.php" id="usuarios1">Presentación</a></li>


            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_alumno.php" id="usuarios2">Horario Alumno</a></li>


            <li class="dropdown">
              <a href="#" id="menu_acciones" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Trámites <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
   
               

                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Exámenes Especiales</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/especiales/busca_matricula.php" id="xcon_ingreso">Registro</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/especiales/cambios_especiales.php" id="xcon_ingreso">Cambios</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/especiales/ver_respuesta.php" id="xcon_ingreso">Ver Respuesta</a></li>
                          </ul>
                        </li>
                
                    <li class="divider"></li>
                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Cambios De Carrera</a>
                          <ul class="dropdown-menu">
 
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cambios_carrera/inicio.php" id="xcon_ingreso">Registro</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cambios_carrera/editar.php" id="xcon_ingreso">Cambios</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/cambios_carrera/consulta.php" id="xcon_ingreso">Ver Respuesta</a></li>

                          </ul>
                        </li>

                    <li class="divider"></li>
                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Reingresos</a>
                          <ul class="dropdown-menu">
 
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/reingresos/mat.php" id="xcon_ingreso">Registro</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/reingresos/buscar_editar.php" id="xcon_ingreso">Cambios</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/reingresos/busca_por_mat.php" id="xcon_ingreso">Ver Respuesta</a></li>

                          </ul>
                        </li>



                    <li class="divider"></li>
                       
                         <li class="dropdown-submenu">
                          <a tabindex="-1" href="#">Materias Verano</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/veranos/busca_matricula.php" id="xcon_ingreso">Registro</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/veranos/cambios_especiales.php" id="xcon_ingreso">Cambios</a></li>
                            <li><a tabindex="-1" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/veranos/ver_respuesta.php" id="xcon_ingreso">Ver Respuesta</a></li>
                          </ul>
                        </li>

<!--                            <li><a tabindex="-1" href="https://www.invasionpuma.com/veranos/" id="xcon_ingreso">Solicitudes de Verano</a></li>-->


<!--
                <li class="divider"></li>
                <li class="dropdown-header">Análisis</li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_alumno.php" id="halumno">Consultar Alumno</a></li>
                <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_maestro.php" id="hmaestro">Consultar Maestro</a></li>
-->
              </ul>
            </li>



            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_maestro.php" id="usuarios3">Horario Maestro</a></li>

            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/login.php" id="usuarios4">Administración</a></li>

            <li><a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/contacto.php" id="usuarios5">Contacto</a></li>

 
            
            

          </ul>

        </div><!--/.nav-collapse -->
        </div>
      </nav>
     
<script>
  
  $(function() {
  var hamburger = document.getElementById('hamburger');
  
  $(hamburger).click(function() {
    $(this).toggleClass('is-active');
  })
})
</script>    

<!-- MENU SIMPLE SOLO UNA OPCION -->
     <!-- Navigation -->
<!--    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">-->
            <!-- Brand and toggle get grouped for better mobile display -->
<!--            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->

 <!--               <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/index.php" id="inicio">Inicio</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/presentacion.php" id="presentacion">Presentación</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_alumno.php" id="halumno">Horario Alumno</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/horario_maestro.php" id="hmaestro">Horario Maestro</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/login.php" id="salir">Administrador</a>

                <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/contacto.php" id="contacto">Contacto</a>

            </div>
        </div>-->
        <!-- /.container -->
   <!-- </nav>-->
		<!-- /.end nav -->