<?php
class AvionDAO
{
    private $id;
    private $tipoAvion;
    private $nombreAvion;
    private $capPasajeros;
    private $cantCombustible;

    public function __construct(
        $id = 0,
        $tipoAvion = "",
        $nombreAvion = "",
        $capPasajeros = "",
        $cantCombustible = ""
    ) {
        $this->id = $id;
        $this->tipoAvion = $tipoAvion;
        $this->nombreAvion = $nombreAvion;
        $this->capPasajeros = $capPasajeros;
        $this->cantCombustible = $cantCombustible;
    }

    /* ============================
       GETTERS Y SETTERS
       ============================ */

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getTipoAvion() {
        return $this->tipoAvion;
    }
    public function setTipoAvion($tipoAvion) {
        $this->tipoAvion = $tipoAvion;
    }

    public function getNombreAvion() {
        return $this->nombreAvion;
    }
    public function setNombreAvion($nombreAvion) {
        $this->nombreAvion = $nombreAvion;
    }

    public function getCapPasajeros() {
        return $this->capPasajeros;
    }
    public function setCapPasajeros($capPasajeros) {
        $this->capPasajeros = $capPasajeros;
    }

    public function getCantCombustible() {
        return $this->cantCombustible;
    }
    public function setCantCombustible($cantCombustible) {
        $this->cantCombustible = $cantCombustible;
    }

    public function insetarAvion()
    {
        return "
            insert
            into 
            GrAlt_Avion(
                idTipo,
                nombreAvion,
                capacidadPasajeros,
                cantCombustible
            )
            values
            (
            	".$this->getTipoAvion().",
                '".$this->getNombreAvion()."',
                ".$this->getCapPasajeros().",
                ".$this->getCantCombustible()."
            );
        ";
    }

    public function consultarAviones()
    {
        return "
            SELECT 
            a.idAvion,
            a.nombreAvion as Avion,
            a.capacidadPasajeros as Capacidad,
            a.cantCombustible as `Capacidad de combustible`,
            t.nombreTipo as `Tipo avion`
            from
            GrAlt_Avion a 
            INNER JOIN GrAlt_TipoAvion t on a.idTipo = t.idTipo;
        ";
    }

    public function consultarAvion()
    {
        return "
            SELECT 
            a.idAvion,
            a.nombreAvion as Avion,
            a.capacidadPasajeros as Capacidad,
            a.cantCombustible as `Capacidad de combustible`,
            t.nombreTipo as `Tipo avion`
            from
            GrAlt_Avion a 
            INNER JOIN GrAlt_TipoAvion t on a.idTipo = t.idTipo;
            WHERE
            a.idAvion = ".$this->getId()."
        ";
    }
}
?>
