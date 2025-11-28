<?php
require_once("persistencia/Conexion.php");



/*


if (!isset($_POST['idPiloto'])) {
    die("Error: No se recibió el ID del piloto.");
}

$idPiloto          = $_POST['idPiloto'];
$nombres           = $_POST['nombres'];
$apellidos         = $_POST['apellidos'];
$correo            = $_POST['correo'];
$telefono          = $_POST['telefono'];
$idEstadoPersona   = $_POST['idEstadoPersona'];

//$fotoNueva = null;
//$rutaFoto = null;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

    $nombreTmp = $_FILES['foto']['tmp_name'];
    $nombreFoto = uniqid('piloto_') . "_" . $_FILES['foto']['name'];
    $rutaDestino = "../../img/pilotos/" . $nombreFoto;

    if (!file_exists("../../img/pilotos/")) {
        mkdir("../../img/pilotos/", 0777, true);
    }

    if (move_uploaded_file($nombreTmp, $rutaDestino)) {
        $rutaFoto = "img/pilotos/" . $nombreFoto;
    }
}

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($rutaFoto === null) {
        $sql = "UPDATE Piloto SET 
                    nombres = :nombres,
                    apellidos = :apellidos,
                    correo = :correo,
                    telefono = :telefono,
                    idEstadoPersona = :estado
                WHERE idPiloto = :id";
    } else {
        $sql = "UPDATE Piloto SET 
                    nombres = :nombres,
                    apellidos = :apellidos,
                    correo = :correo,
                    telefono = :telefono,
                    idEstadoPersona = :estado,
                    foto = :foto
                WHERE idPiloto = :id";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':estado', $idEstadoPersona);
    $stmt->bindParam(':id', $idPiloto);

    if ($rutaFoto !== null) {
        $stmt->bindParam(':foto', $rutaFoto);
    }

    $stmt->execute();

    header("Location: ../../presentacion/piloto/listarPilotos.php?msg=actualizado");
    exit();

} catch (PDOException $e) {
    die("Error al actualizar piloto: " . $e->getMessage());
}

?>