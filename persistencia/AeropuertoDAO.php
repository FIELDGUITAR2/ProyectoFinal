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

        public function consultarListaAeropuertos()
        {
            return "
                select 
                a.idAeropuerto,
                a.nombreAeropuerto,
                a.direccion,
                c.nombreCiudad,
                p.nombrePais
                from 
                GrAlt_Aeropuerto a
                INNER JOIN 
                GrAlt_Ciudad c on a.idCiudad = c.idCiudad
                INNER JOIN 
                GrAlt_Pais p on c.idPais = p.idPais
                ORDER BY
                p.nombrePais,
                c.nombreCiudad;
            ";

        }
        
    }
?>