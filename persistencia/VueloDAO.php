<?php

class VueloDAO {
    private $idVuelo;
    private $avion;
    private $piloto;
    private $copiloto;
    private $origen;
    private $destino;
    private $estado;
    private $hora;
    private $fecha;
    private $cantidad_Pas;   
    
    public function __construct(
        $idVuelo = "",
        $avion = "",
        $piloto = "",
        $copiloto = "",
        $origen = "",
        $destino = "",
        $estado = "",
        $hora = "",
        $fecha = "",
        $cantidad_Pas = 0
    ) {
        $this->idVuelo = $idVuelo;
        $this->avion = $avion;
        $this->piloto = $piloto;
        $this->copiloto = $copiloto;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->estado = $estado;
        $this->hora = $hora;
        $this->fecha = $fecha;
        $this->cantidad_Pas = $cantidad_Pas;
    }

    // ----- GETTERS -----
    public function getIdVuelo() {
        return $this->idVuelo;
    }

    public function getAvion() {
        return $this->avion;
    }

    public function getPiloto() {
        return $this->piloto;
    }

    public function getCopiloto() {
        return $this->copiloto;
    }

    public function getOrigen() {
        return $this->origen;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCantidadPasajeros() {
        return $this->cantidad_Pas;
    }

    // ----- SETTERS -----
    public function setIdVuelo($idVuelo) {
        $this->idVuelo = $idVuelo;
    }

    public function setAvion($avion) {
        $this->avion = $avion;
    }

    public function setPiloto($piloto) {
        $this->piloto = $piloto;
    }

    public function setCopiloto($copiloto) {
        $this->copiloto = $copiloto;
    }

    public function setOrigen($origen) {
        $this->origen = $origen;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCantidadPasajeros($cantidad) {
        $this->cantidad_Pas = $cantidad;
    }

    public function consultarVuelosProximos()
    {
        return "
            SELECT 
            v.idVuelo, 
            ori.nombreAeropuerto as Origen, 
            des.nombreAeropuerto as Destino, 
            v.fecha, 
            v.hora
            FROM GrAlt_Vuelo v
            INNER JOIN GrAlt_Aeropuerto ori on v.idOrigen = ori.idAeropuerto
            INNER JOIN GrAlt_Aeropuerto des on v.idDestino = des.idAeropuerto
            WHERE fecha > CURDATE()
               OR (fecha = CURDATE() AND hora > CURTIME())
            ORDER BY fecha, hora;
        ";
    }
}

?>
