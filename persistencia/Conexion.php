<?php

class Conexion
{
    private $conexion;
    private $resultado;

    public function abrir()
    {
        if ($_SERVER['REMOTE_ADDR'] == "::1") {
            // Conexión local desde XAMPP (puerto 3310)
            // $this->conexion = new mysqli("127.0.0.1", "root", "", "copatoon");
            $this->conexion = new mysqli("localhost", "root", "", "AltairAir", 3306);
        } else {
            // Conexión en servidor remoto
            $this->conexion = new mysqli("localhost", "itiud_aplint", "GYesgQ118&", "itiud_aplint");
        }

        //$this->conexion = new mysqli("localhost", "root", "", "AltairAir");
    }

    public function cerrar()
    {
        $this->conexion->close();
    }

    public function ejecutar($sentencia)
    {
        $this->resultado = $this->conexion->query($sentencia);
    }

    public function ejecutarTF($sentencia)
    {
        $this->resultado = $this->conexion->query($sentencia);
        return $this->resultado; // <-- devolver el resultado de la consulta
    }


    public function registro()
    {
        return $this->resultado->fetch_row();
    }

    public function filas()
    {
        return $this->resultado->num_rows;
    }
}
