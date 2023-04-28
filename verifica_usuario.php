<?php
session_start();
//$_SESSION['tmptxt'];
      
       //$_SESSION['usuario']="";
       if (isset($_POST['usuario']) && isset($_POST['contra']) && isset($_POST['capt'])){

            $usu=$_POST['usuario'];
            $contra=$_POST['contra'];
            $capt=$_POST['capt'];
            include("class/class_usuarios_dal.php");
            $obj_usuario=new usuarios_dal;

            //print $capt.'='.$_SESSION['tmptxt']; 

            $existe=$obj_usuario->verify_user($usu,$contra);
            //echo 'logn acciones:'.$existe;exit;
            if (($existe==1) and ($capt==$_SESSION['tmptxt'])) {
                      //session_start();
                      $_SESSION['usuario']=$usu;
                      $_SESSION['tipou']=$obj_usuario->verify_usertipo($usu,$contra);
                      print 'true';
            }
            else if ($existe!=1){
                print 'Error: Usuario o contraseña inválidos, vuelva a intentar';
                }
            else {
                print 'Error: Código de seguridad incorrecto, vuelva a intentar';
                }
    }
    else{
        print 'No pude recoger los datos del formulario(post), Error web page en login';
    }
?>