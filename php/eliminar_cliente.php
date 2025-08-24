<?php
$mysqli = new mysqli("localhost", "root", "", "shori_express");

if (isset($_GET['doc'])) {
    $documento = $_GET['doc'];
    $sql = "DELETE FROM usuario WHERE documento_usuario = '$documento' AND id_rol = 3";

    if ($mysqli->query($sql)) {
        header("Location: ../admin_clientes.php?msg=Eliminado correctamente");
        exit();
    } else {
        echo "Error al eliminar: " . $mysqli->error;
    }
} else {
    echo "Documento no especificado.";
}
?>
