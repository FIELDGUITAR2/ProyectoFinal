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
                select 
                idPiloto 
                from 
                GrAlt_Piloto 
                WHERE 
                correo = '".$this->getCorreo()."' and clave = md5('".$this->getClave()."');
                ";
        }

        public function consultarPilotos()
        {
                return"
                        select 
                        p.idPiloto, 
                        p.nombres,
                        p.apellidos, 
                        p.correo, 
                        p.foto, 
                        e.nombreEstado,
                        p.telefono,
                        p.fecha_nac
                        from
                        GrAlt_Piloto p
                        INNER JOIN 
                        GrAlt_EstadoPersona e on p.idEstadoPersona = e.idEstadoPersona
                        
                ";
        }

        public function actualizarPiloto()
        {
                
                return "
                UPDATE 
                GrAlt_Piloto SET 
                nombres = '".$this->getNombre()."', 
                apellidos = '".$this->getApellido()."', 
                correo = '".$this->getCorreo()."', 
                foto = '".$this->getFoto()."', 
                idEstadoPersona = ".$this->getIdEstadoPersona().", 
                fecha_nac = '".$this->getFecha_nac()."', 
                telefono = '".$this->getTelefono()."'
                WHERE 
                idPiloto = '".$this->getId()."'; 
                ";
        }

        public function consultar()
        {
                return "
                        select 
                        p.nombres, 
                        p.apellidos, 
                        p.correo,                        
                        p.clave, 
                        p.foto, 
                        e.nombreEstado,
                        p.telefono,
                        p.fecha_nac
                        from
                        GrAlt_Piloto p
                        INNER JOIN 
                        GrAlt_EstadoPersona e on p.idEstadoPersona = e.idEstadoPersona
                        where p.idPiloto = ".$this->getId()."
                ";
        }

        public function agregar()
        {
                return "
                insert into GrAlt_Piloto(nombres,apellidos,telefono,correo,clave,fecha_nac,idEstadoPersona) 
                values
(               '".$this->getNombre()."','".$this->getApellido()."','".$this->getTelefono()."','".$this->getCorreo()."','".$this->getClave()."','".$this->getFecha_nac()."',".$this->getIdEstadoPersona().");
                ";
        }
    }
?>