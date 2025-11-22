<?php
require_once('logica/Persona.php');
require_once('persistencia/PilotoDAO.php');
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
        return false;
    }
}
