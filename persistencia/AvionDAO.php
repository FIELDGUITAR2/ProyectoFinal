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
}
?>
