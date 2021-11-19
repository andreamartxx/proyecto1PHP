<?php
    $title = "Home";
    require_once "./utils/utils.php";
    require_once "./entity/ImagenGaleria.php";
    require_once "./entity/Asociado.php";
    require_once "./database/Connection.php";
    require_once "./repository/ImagenGaleriaRepository.php";

    $config = require_once 'App/config.php';
    App::bind('config', $config);
    App::bind('connection', Connection::make($config['database']));

    $repositorio = new ImagenGaleriaRepository();
    $galeria = $repositorio->findAll();

    $asociados[] = new Asociado("First Partner Name", "log1.jpg", "First Partner Name");
    $asociados[] = new Asociado("Second Partner Name", "log2.jpg", "Second Partner Name");
    $asociados[] = new Asociado("Third Partner Name", "log3.jpg", "Third Partner Name");
    $asociados[] = new Asociado("Fourth Partner Name", "log1.jpg", "Fourth Partner Name");
    $asociados = getAsociados($asociados);

    include("./views/index.view.php");
