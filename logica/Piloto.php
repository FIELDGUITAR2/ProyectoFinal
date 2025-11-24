<?php
    require_once ('logica/Persona.php');
    require_once ('persistencia/PilotoDAO.php');
    require_once ('persistencia/Conexion.php');
    class Piloto extends Persona{
        
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
                $conexion = new Conexion();
                $pilotoDAO = new PilotoDAO();
                $conexion->abrir();
                $conexion->ejecutar($pilotoDAO->autenticar());                
                if(($datos = $conexion->registro()) != null)
                {
                        $piloto = new Piloto($datos[0]);                        
                        $conexion -> cerrar();
                        return true;
                }
                $conexion->cerrar();
                return false;
        }

        public function consultarPilotos()
        {
                $conexion = new Conexion();
                $pilotoDAO = new PilotoDAO();
                $conexion->abrir();
                $conexion->ejecutar($pilotoDAO->consultarPilotos());                
                $conexion->registro();
                $lista = array();
                while(($dato = $conexion->registro()) != null)
                {
                        $piloto = new Piloto(
                        $dato[0], 
                        $dato[1], 
                        $dato[2], 
                        $dato[3], 
                        "", 
                        "", 
                        "", 
                        $dato[4], 
                        $dato[5], 
                        $dato[6]);
                        array_push($lista, $piloto);
                        
                }
                $conexion->cerrar();
                return $lista;
        }
    }
?>