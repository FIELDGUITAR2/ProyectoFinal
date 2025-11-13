<?php
require_once ("persistencia/EstadoCitaDAO.php");

class EstadoCita{
    private $id;
    private $valor;
    
    public function __construct($id=0, $valor=""){
        $this -> id = $id;
        $this -> valor = $valor;
    }
    
    
    public function getId(){
        return $this -> id;
    }
    
    public function getValor(){
        return $this -> valor;
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $estadoCitaDAO = new EstadoCitaDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($estadoCitaDAO -> consultar());
        $estadosCitas = array();
        while(($datos = $conexion -> registro()) != null){
            $estadoCita = new EstadoCita($datos[0], $datos[1]);
            array_push($estadosCitas, $estadoCita);
        }
        $conexion -> cerrar();
        return $estadosCitas;
    }
    
}


?>