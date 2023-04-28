<?php
 function validaRequerido($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }

 function validaSelecthtml($valor){
    if ($valor=='0'){
      return false;
    }
    else{
      return true;
    }
}
 ?>