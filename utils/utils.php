<?php

function esOpcionMenuActiva(string $option): bool{

    

   if(strpos($_SERVER["REQUEST_URI"],$option)){

        return true;

   }elseif(($_SERVER["REQUEST_URI"]&& $option=="/")){

        return true;
   
    }else {

        return false;

   }

}




?>

