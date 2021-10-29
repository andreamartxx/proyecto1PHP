<?php
    $title = "Asociados";
    require_once "./utils/utils.php";
    require_once "./entity/Asociado.php";
    require_once "./utils/File.php";
    require_once "./exceptions/FileException.php";
    require_once "./utils/SimpleImage.php";

    $info = $descripcion = $nombre= $urlImagen = "";
    $nombreError = $imagenErr = $hayErrores = false;
    $errores = [];

    if("POST" === $_SERVER["REQUEST_METHOD"]){
        
        try{
            if(empty($_POST)){
               throw new FileException('Se ha producido un error al procesar el formulario');
            }
            $imageFile = new File("imagen", array("image/jpeg", "image/jpg", "image/png"), (2 *1024 *1024));

            $imageFile->saveUploadedFile(Asociado::RUTA_IMAGENES_LOGO);

            try{

                $simpleImagen = new \claviska\SimpleImage();
         
             
             $simpleImagen
                 ->fromFile(Asociado::RUTA_IMAGENES_LOGO. $imageFile->getFileName()) 
                 ->resize(50, 50)                          
                 ->toFile(Asociado::RUTA_IMAGENES_LOGO. $imageFile->getFileName());                        
                 
             }catch(Exception $err){
                 $errores[] = $err->getMessage();
                 $imagenErr = true;
             }

        }catch(FileException $fe){
            $errores[] = $fe -> getMessage();
            $imagenErr = true;
        }
       
        $nombre = sanitizeInput(($_POST["nombre"] ?? ""));
        $descripcion = sanitizeInput(($_POST["descripcion"] ?? ""));
        
        if(empty($nombre)){
            $errores[] = "El nombre es obligatorio";
            $nombreError = true;
        }
        
        if(empty($descripcion)){
            $errores[] = "La descripción es obligatoria";
            $descripcionError = true;
        }

        if(0 == count($errores)){
            $info = 'Imagen enviada correctamente: ';
            $urlImagen = Asociado::RUTA_IMAGENES_LOGO . $imageFile->getFileName();
            $descripcion = "";
            $nombre = "";
        }else{
            $info =  "Datos erróneos";
        }

    }

    include("./views/asociados.view.php");
