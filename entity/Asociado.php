<?php

    class Asociado{

        const RUTA_IMAGENES_LOGO = 'images/index/';

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
        private $logo;

        /**
         * Undocumented variable
         *
         * @var string
         */
        private $descripcion;
        

        public function __construct(string $nombre, string $logo, string $descripcion = ""){
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;           

        }

        public function getUrlAsociados() : string

        {

            return self::RUTA_IMAGENES_LOGO . $this->getNombre();

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
         * Get de value of logo
         *
         * @return string
         */
        public function getLogo()
        {

                return $this->logo;
        }
        
        /**
         * Set the value of logo
         *
         * @return self
         */
        public function setLogo($logo)
        {
                $this->logo = $logo;

                return $this;
        }

        /**
         * Get the value of descripcion
         *
         * @return  string
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
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

        

    }

?>
