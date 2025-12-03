<?php
    class TipoAvionDAO{
        private $idTipo;
        private $nombre;

        public function __construct($idTipo = "", $nombre = "")
        {
            $this->idTipo = $idTipo;
            $this->nombre = $nombre;
            throw new \Exception('Not implemented');
        }
        

        /**
         * Get the value of idTipo
         */ 
        public function getIdTipo()
        {
                return $this->idTipo;
        }

        /**
         * Set the value of idTipo
         *
         * @return  self
         */ 
        public function setIdTipo($idTipo)
        {
                $this->idTipo = $idTipo;

                return $this;
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

        public function consultarTipos()
        {
                return "select
                        idTipo,
                        nombreTipo
                        from
                        GrAlt_TipoAvion;";
        }
    }
?>