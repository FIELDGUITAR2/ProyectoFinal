<?php
session_start();
session_unset();   // Borra las variables de sesión
session_destroy(); // Destruye la sesión
$_SESSION["rol"] = "false";
?>