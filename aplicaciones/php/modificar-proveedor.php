<?php
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["id"])) {
    http_response_code(400);
	exit("Falta ID"); # Terminar el script definitivamente
}

if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta nombre"); # Terminar el script definitivamente
}

if (empty($_POST["telefono"])) {
    http_response_code(400);
	exit("Falta telefono"); # Terminar el script definitivamente
}

if (empty($_POST["direccion"])) {
    http_response_code(400);
	exit("Falta direccion"); # Terminar el script definitivamente
}

if (empty($_POST["email"])) {
    http_response_code(400);
	exit("Falta email"); # Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$proveedor = [
    "id" => $_POST["id"],
    "nombre" => $_POST["nombre"],
    "telefono" => $_POST["telefono"],
    "direccion" => $_POST["direccion"],
    "email" => $_POST["email"]
];

try {
    # Preparando la consulta
    $sentencia = $conex->prepare("UPDATE proveedor SET nom_proveedor=:nombre, telefono=:telefono, direccion=:direccion, email=:email WHERE id_proveedor=:id;");
    $resultado = $sentencia->execute($proveedor);
    http_response_code(200);
    echo "Datos actualizados";
} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>