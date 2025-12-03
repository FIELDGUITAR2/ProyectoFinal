<?php
require_once('persistencia/Conexion.php');
require_once('persistencia/TipoAvionDAO.php');
    class TipoAvion{
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
            $conexion = new Conexion();
            $tipoAvionDAO = new TipoAvionDAO();
            $conexion->abrir();
            $conexion->ejecutar($tipoAvionDAO->consultarTipos());
            $tipos = array();
            while(($dato = $conexion->registro())!=null)
            {
                $tipo = new TipoAvion(
                    $dato[0],
                    $dato[1]
                );
                array_push($tipos, $tipo);
            }
            $conexion->cerrar();
            return $tipos;
        }
    }
?>