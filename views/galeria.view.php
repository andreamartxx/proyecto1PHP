
<?php

include __DIR__ . "/partials/inicio-doc.part.php";
include __DIR__ . "/partials/nav.part.php";

?>  

<!-- Principal Content Start -->
 <div id="galeria">
       <div class="container">
         <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALERÍA</h1>
            <hr>

          <?php if("POST" === $_SERVER["REQUEST_METHOD"]) : ?>

          <?php endif;?>
          <?php if(("POST" === $_SERVER["REQUEST_METHOD"])&&(empty($errores))) : ?>
                <a href='<?=$urlImagen?>' target="_blank">Ver Imagen</a>
          <?php endif;?>

            <form class="form-horizontal" action="/galeria.php" method="POST" enctype="multipart/form-data">

              <div class="form-group">

              <div class="col-xs-12">

                  <label for="imagen" class="label-control">Imagen</label>

                  <input class="form-control-file" type="file" name="imagen">

              </div>

              <div class="form-group">
                <div class="col-xs-12">
                    <label class="label-control" for="description">Descripción<?=$description;?></label>
                    <textarea class="form-control" name="description" id="description"><?=$description;?></textarea>
                    <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                </div>
              </div>
          </form>
         </div>
       </div>
 </div>
 
 <?php

 include __DIR__ . "/partials/fin-doc.part.php";

?>