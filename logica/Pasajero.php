<?php
require_once('logica/Persona.php');
require_once('persistencia/PasajeroDAO.php');
require_once('persistencia/Conexion.php');

class Pasajero extends Persona
{

    private $foto;
    private $idEstadoPersona;
    private $telefono;
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $idEstadoPersona = "", $telefono = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->idEstadoPersona = $idEstadoPersona;
        $this->telefono = $telefono;
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
        $pasajeroDAO = new PasajeroDAO(
            "",
            "",
            "", 
            $this -> correo, 
            $this -> clave);
        $conexion -> abrir();
        $conexion -> ejecutar($pasajeroDAO -> autenticar());
        if($conexion -> filas() == 1){            
            $this -> id = $conexion -> registro()[0];
            $conexion->cerrar();
            return true;
        }else{
            $conexion->cerrar();
            return false;
        }
    }
}
