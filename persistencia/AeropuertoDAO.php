<?php
    class AeropuertoDAO {
        private $id;
        private $nombre;
        private $direccion;
        private $ciudad;

        public function __construct($id = "", $nombre = "", $direccion ="", $ciudad = "") {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->ciudad = $ciudad;
        }

        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function getCiudad()
        {
                return $this->ciudad;
        }


        
    }
?>