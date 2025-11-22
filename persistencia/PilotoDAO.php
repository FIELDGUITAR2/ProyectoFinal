<?php
    require_once "PersonaDAO.php";
    class PilotoDAO extends PersonaDAO{
        
        private $edad;
        private $fecha_nac;
        private $foto;
        private $idEstadoPersona;
        private $telefono;

        public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $edad = "", $fecha_nac = "", $foto = "", $idEstadoPersona = "", $telefono = "")
        {
            parent::__construct($id, $nombre, $apellido, $correo, $clave);
            $this->edad = $edad;
            $this->fecha_nac = $fecha_nac;
            $this->foto = $foto;
            $this->idEstadoPersona = $idEstadoPersona;
            $this->telefono = $telefono;
        }
        

        /**
         * Get the value of edad
         */ 
        public function getEdad()
        {
                return $this->edad;
        }

        /**
         * Get the value of fecha_nac
         */ 
        public function getFecha_nac()
        {
                return $this->fecha_nac;
        }

        /**
         * Get the value of foto
         */ 
        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Get the value of idEstadoPersona
         */ 
        public function getIdEstadoPersona()
        {
                return $this->idEstadoPersona;
        }

        /**
         * Get the value of telefono
         */ 
        public function getTelefono()
        {
                return $this->telefono;
        }

        public function autenticar()
        {
                return "
                select idPiloto from Piloto WHERE correo = '".$this->getCorreo()."' and clave = md5('".$this->getClave()."');
                ";
        }
    }
?>