<?php

    class ImagenGaleria{

        const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';

        const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';


        /**

        * Devuelve el path a las imágenes del portfolio

        *

        * @return string

        */

        public function getUrlPortfolio() : string

        {

            return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();

        }

        /**

        * Devuelve el path a las imágenes de la galería

        *

        * @return string

        */

        public function getUrlGallery() : string

        {

            return self::RUTA_IMAGENES_GALLERY . $this->getNombre();

        }
    
        /**
         * Undocumented variable
         *
         * @var string
         */

        private $nombre;

        /**
         * Undocumented variable
         *
         * @var string
         */
        private $descripcion;

        /**
         * Undocumented variable
         *
         * @var int
         */
        private $numVisualizaciones;

        /**
         * Undocumented variable
         *
         * @var int
         */
        private $numLikes;

        /**
         * Undocumented variable
         *
         * @var int
         */
        private $numDownloads;
        

        public function __construct(string $nombre, string $descripcion,
                                    int $numVisualizaciones = 0, int $numLikes = 0,
                                    int $numDownloads = 0){
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numVisualizaciones=$numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDownloads = $numDownloads;

            

        }
    
    

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        

        /**
         * Get undocumented variable
         *
         * @return  string
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set undocumented variable
         *
         * @param  string  $descripcion  Undocumented variable
         *
         * @return  self
         */ 
        public function setDescripcion(string $descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        

        /**
         * Get undocumented variable
         *
         * @return  int
         */ 
        public function getNumVisualizaciones()
        {
                return $this->numVisualizaciones;
        }

        /**
         * Set undocumented variable
         *
         * @param  int  $numVisualizaciones  Undocumented variable
         *
         * @return  self
         */ 
        public function setNumVisualizaciones(int $numVisualizaciones)
        {
                $this->numVisualizaciones = $numVisualizaciones;

                return $this;
        }

        

        /**
         * Get undocumented variable
         *
         * @return  int
         */ 
        public function getNumLikes()
        {
                return $this->numLikes;
        }

        /**
         * Set undocumented variable
         *
         * @param  int  $numLikes  Undocumented variable
         *
         * @return  self
         */ 
        public function setNumLikes(int $numLikes)
        {
                $this->numLikes = $numLikes;

                return $this;
        }

        

        /**
         * Get undocumented variable
         *
         * @return  int
         */ 
        public function getNumDownloads()
        {
                return $this->numDownloads;
        }

        /**
         * Set undocumented variable
         *
         * @param  int  $numDownloads  Undocumented variable
         *
         * @return  self
         */ 
        public function setNumDownloads(int $numDownloads)
        {
                $this->numDownloads = $numDownloads;

                return $this;
        }


    }


?>
