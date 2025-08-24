<?php
session_start();

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Método no permitido. Por favor, usa el método POST.');
}

$mysqli = new mysqli("localhost", "root", "", "shori_express");

// Verificar conexión
if ($mysqli->connect_errno) {
    die("Error en la conexión a MySQL: " . $mysqli->connect_error);
}

// Capturar los datos del formulario
$tipoDoc      = $_POST['tipo_documento'];
$documento    = $_POST['documento'];
$nombre       = $_POST['username'];
$apellido     = $_POST['apellido'];
$correo       = $_POST['email'];
$telefono     = $_POST['telefono'];
$direccion    = $_POST['direccion'];
$contraseña   = $_POST['password'];
$confirmaPass = $_POST['confirm_password'];
$estado = 'activo';
$rol = 3; // numérico

// Validar campos vacíos
if (
    empty($nombre) || empty($apellido) || empty($tipoDoc) || empty($documento) || 
    empty($telefono) || empty($correo) || empty($direccion) || 
    empty($contraseña) || empty($confirmaPass)
) {
    $_SESSION['error'] = "Todos los campos son obligatorios.";
    header("Location: ../register.php");
    exit();
}

// Validar contraseñas iguales
if ($contraseña !== $confirmaPass) {
    $_SESSION['error'] = "Las contraseñas no coinciden.";
    header("Location: ../register.php");
    exit();
}


// Verificar si el documento ya existe
$query = $mysqli->query("SELECT * FROM usuario WHERE documento_usuario = '$documento'");

if ($query->num_rows > 0) {
    $_SESSION['error'] = "El número de documento ya está registrado.";
    header("Location: ../register.php");
    exit();
} else {
   $consulta = "INSERT INTO usuario 
    (tipo_documento_usuario, documento_usuario, nombre_usuario, contraseña_usuario, primer_nombre_usuario, apellido_usuario, correo_usuario, telefono_usuario, direccion_usuario, estado_usuario, id_rol) 
    VALUES 
    ('$tipoDoc', '$documento', '$nombre', '$contraseña', '$nombre', '$apellido', '$correo', '$telefono', '$direccion', '$estado', '$rol')";


    if ($mysqli->query($consulta)) {
        $_SESSION['error'] = "Usuario registrado exitosamente.";
        header("Location: ../login.php");
    } else {
        $_SESSION['error'] = "Error en el registro: " . $mysqli->error;
        header("Location: ../register.php");

    }
}

