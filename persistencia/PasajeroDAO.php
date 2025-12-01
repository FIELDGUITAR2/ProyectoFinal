<?php
require_once "PersonaDAO.php";

class PasajeroDAO extends PersonaDAO
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
        return "
        select 
        idPasajero
        FROM
        GrAlt_Pasajero
        where
        correo = '".$this->getCorreo()."' and clave = md5('".$this->getClave()."');";
    }

    public function consultar()
    {
        return "
        select
        nombres,
        apellidos,
        correo,
        foto,
        telefono
        From
        GrAlt_Pasajero
        where
        idPasajero = ".$this->getId().";
        ";
    }
}
