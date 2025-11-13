<?php

class EstadoCitaDAO{
    private $id;
    private $nombre;
    
    public function __construct($id=0, $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    
    public function consultar(){
        return "select idEstadoCita, valor
                from EstadoCita";
    }
    
}


?>