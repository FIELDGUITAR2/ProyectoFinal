<?php
    class EstadoPersonaDAO{
        private $idEstadoPersona;
        private $NombreEstado;

        public function __construct($idEstadoPersona = "", $NombreEstado = "")
        {
            $this->idEstadoPersona = $idEstadoPersona;
            $this->NombreEstado = $NombreEstado;
        }

        /**
         * Get the value of idEstadoPersona
         */ 
        public function getIdEstadoPersona()
        {
                return $this->idEstadoPersona;
        }

        /**
         * Get the value of NombreEstado
         */ 
        public function getNombreEstado()
        {
                return $this->NombreEstado;
        }

        public function consultar()
        {
            return"
                select idEstadoPersona, nombreEstado
                from GrAlt_EstadoPersona
            ";    
        }

        
    }
?>