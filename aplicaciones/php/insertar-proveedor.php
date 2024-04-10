<?php
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["nombre"]) || empty($_POST["telefono"]) || empty($_POST["direccion"]) || empty($_POST["email"])) {
    http_response_code(400);
    exit("Faltan campos requeridos");
}

try {
    # Conexión a la base de datos
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Datos del nuevo registro
    $proveedor = [
        "nombre" => $_POST["nombre"],
        "telefono" => $_POST["telefono"],
        "direccion" => $_POST["direccion"],
        "email" => $_POST["email"]
    ];

    # Preparar la consulta de inserción
    $sentencia = $conex->prepare("INSERT INTO proveedor (nom_proveedor, telefono, direccion, email) VALUES (:nombre, :telefono, :direccion, :email)");
    
    # Ejecutar la consulta con los datos del nuevo producto
    $resultado = $sentencia->execute($proveedor);

    http_response_code(200);
    echo "Datos insertados correctamente";

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>