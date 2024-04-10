<?php
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["fecha_pedido"]) || empty($_POST["id_producto"]) || empty($_POST["id_proveedor"]) || empty($_POST["cantidad_solicitada"]) || empty($_POST["estado"]) || empty($_POST["fecha_surtido"]) || empty($_POST["costo_pedido"])) {
    http_response_code(400);
    exit("Faltan campos requeridos");
}

try {
    # Conexión a la base de datos
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Datos del nuevo registro
    $pedido = [
        "fecha_pedido" => $_POST["fecha_pedido"],
        "id_producto" => $_POST["id_producto"],
        "id_proveedor" => $_POST["id_proveedor"],
        "cantidad_solicitada" => $_POST["cantidad_solicitada"],
        "estado" => $_POST["estado"],
        "fecha_surtido" => $_POST["fecha_surtido"],
        "costo_pedido" => $_POST["costo_pedido"]
    ];

    # Preparar la consulta de inserción
    $sentencia = $conex->prepare("INSERT INTO pedido (fecha_pedido, id_producto, id_proveedor, cantidad_solicitada, estado, fecha_surtido, costo_pedido) VALUES (:fecha_pedido, :id_producto, :id_proveedor, :cantidad_solicitada, :estado, :fecha_surtido, :costo_pedido)");
    
    # Ejecutar la consulta con los datos del nuevo producto
    $resultado = $sentencia->execute($pedido);

    http_response_code(200);
    echo "Datos insertados correctamente";

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>