<?php
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["fecha_venta"]) || empty($_POST["id_producto"]) || empty($_POST["cantidad"]) || empty($_POST["precio_unitario"])) {
    http_response_code(400);
    exit("Faltan campos requeridos");
}

try {
    # Conexión a la base de datos
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Datos del nuevo registro
    $venta = [
        "fecha_venta" => $_POST["fecha_venta"],
        "id_producto" => $_POST["id_producto"],
        "cantidad" => $_POST["cantidad"],
        "precio_unitario" => $_POST["precio_unitario"]
    ];

    # Preparar la consulta de inserción
    $sentencia = $conex->prepare("INSERT INTO venta (fecha_venta, id_producto, cantidad, precio_unitario) VALUES (:fecha_venta, :id_producto, :cantidad, :precio_unitario)");
    
    # Ejecutar la consulta con los datos del nuevo producto
    $resultado = $sentencia->execute($venta);

    http_response_code(200);
    echo "Datos insertados correctamente";

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>