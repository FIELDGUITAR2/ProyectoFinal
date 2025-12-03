<?php
    class BoletoDAO
{
    private $asiento;
    private $idBoleto;
    private $clase;
    private $pasajero;
    private $vuelo;
    private $precio;

    public function __construct(
        $asiento = "",
        $idBoleto = "",
        $clase = "",
        $pasajero = "",
        $vuelo = "",
        $precio = ""
    ) {
        $this->asiento   = $asiento;
        $this->idBoleto  = $idBoleto;
        $this->clase     = $clase;
        $this->pasajero  = $pasajero;
        $this->vuelo     = $vuelo;
        $this->precio    = $precio;
    }

    // ============================
    // GETTERS
    // ============================

    public function getAsiento(){
        return $this->asiento;
    }

    public function getIdBoleto(){
        return $this->idBoleto;
    }

    public function getClase(){
        return $this->clase;
    }

    public function getPasajero(){
        return $this->pasajero;
    }

    public function getVuelo(){
        return $this->vuelo;
    }

    public function getPrecio(){
        return $this->precio;
    }

    // ============================
    // SETTERS
    // ============================

    public function setAsiento($asiento){
        $this->asiento = $asiento;
    }

    public function setIdBoleto($idBoleto){
        $this->idBoleto = $idBoleto;
    }

    public function setClase($clase){
        $this->clase = $clase;
    }

    public function setPasajero($pasajero){
        $this->pasajero = $pasajero;
    }

    public function setVuelo($vuelo){
        $this->vuelo = $vuelo;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }     

    public function consultarBoleto()
    {
        return "
            select 
            b.asiento,
            b.idBoleto,
            c.nombreClase,
            v.hora,
            v.fecha,
            b.precio
            FROM
            GrAlt_Boleto b
            INNER JOIN GrAlt_ClaseBoleto c on b.idClase = c.idClase
            INNER JOIN GrAlt_Vuelo v on b.idVuelo = v.idVuelo
            WHERE
            idPasajero = ".$this->getPasajero().";
        ";
    }

    }
    /*
    
    */
?>