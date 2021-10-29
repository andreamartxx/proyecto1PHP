<?php

     function esOpcionMenuActiva(string $option): bool{

     if(strpos($_SERVER["REQUEST_URI"], $option)){

          return true;

     }elseif(($_SERVER["REQUEST_URI"]== "" && $option=="index")){

          return true;
     
     }else{

          return false;

          }
     }

     function existeOpcionMenuActivaEnArray (array $options):bool{
          
          foreach($options as $valor){

               if(esOpcionMenuActiva($valor)){

                    return true;

               }else{

                    return false;
                    
               }

          }
          
          return false;
     }

     function sanitizeInput(string $data): string {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);

          return $data;
     }

     function getAsociados (array $asociados): array{

          shuffle($asociados);

          return array_slice($asociados, 0, 3);
     }

?>

