<?php
    $title = "Galería";
    require_once "./utils/utils.php";
    require_once "./utils/Forms/TextareaElement.php";
    require_once "./utils/Forms/ButtonElement.php";
    require_once "./utils/Forms/FileElement.php";
    require_once "./utils/Forms/FormElement.php";
    require_once "./utils/Forms/custom/MyFormGroup.php";
    require_once "./utils/Forms/custom/MyFormControl.php";
    require_once "./utils/Validator/NotEmptyValidator.php";
    require_once "./utils/Validator/MimetypeValidator.php";
    require_once "./utils/Validator/MaxSizeValidator.php";    
    require_once "./exceptions/FileException.php";
    require_once "./utils/SimpleImage.php";
    require_once "./entity/ImagenGaleria.php";
    
    $info = $urlImagen = "";

    $description = new TextareaElement();
    $description
     ->setName('descripcion')
     ->setId('descripcion')
     ->setValidator(new NotEmptyValidator('La descripción es obligatoria', true));
    $descriptionWrapper = new MyFormControl($description, 'Descripción', 'col-xs-12');

    $fv = new MimetypeValidator(['image/jpeg', 'image/jpg', 'image/png'], 'Formato no soportado', true);
    
    $fv->setNextValidator(new MaxSizeValidator(2 * 1024 * 1024, 'El archivo no debe exceder 2M', true));
    $file = new FileElement();
    $file
      ->setName('imagen')
      ->setId('imagen')
      ->setValidator($fv);

    $labelFile = new LabelElement('Imagen', $file);

    $b = new ButtonElement('Send');
    $b->setCssClass('pull-right btn btn-lg sr-button');

    $form = new FormElement('', 'multipart/form-data');
    $form
    ->setCssClass('form-horizontal')
    ->appendChild($labelFile)
    ->appendChild($file)
    ->appendChild($descriptionWrapper)
    ->appendChild($b);

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        $form->validate();
        if (!$form->hasError()) {
          try {
            $file->saveUploadedFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);  
              // Create a new SimpleImage object
              $simpleImage = new \claviska\SimpleImage();
              $simpleImage
              ->fromFile(ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName())  
              ->resize(975, 525)
              ->toFile(ImagenGaleria::RUTA_IMAGENES_PORTFOLIO . $file->getFileName())
              ->resize(650, 350)
              ->toFile(ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName()); 
              $info = 'Imagen enviada correctamente'; 
              $urlImagen = ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName();
              //grabamos en la base de datos
              $connection = connection::make();
              $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES ('".$file->getFileName() . "' , '" . $description->getValue() . "')";
              $pdoStatement = $connection->prepare($sql);
              $parameters = [
                ':nombre'=>$file->getFileName(),
                ':descripcion'=>$description->getValue()
              ];
              if(false === $pdopStatement->execute($parameters)){
                $form->addError('No se ha podido guardar la imagen en la base de datos');
              }else{
                $info = 'Imagen enviada correctamente';
                $form->reset();
              }
              
            
          }catch(Exception $err) {
              $form->addError($err->getMessage());
              $imagenErr = true;
          }
        }else{
          
        }
    }
    include("./views/galeria.view.php");
