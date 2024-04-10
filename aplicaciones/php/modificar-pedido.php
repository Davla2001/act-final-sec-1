<?php
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["id_pedido"])) {
    http_response_code(400);
	exit("Falta ID"); # Terminar el script definitivamente
}

if (empty($_POST["fecha_pedido"])) {
    http_response_code(400);
	exit("Falta la fecha de pedido"); # Terminar el script definitivamente
}

if (empty($_POST["id_producto"])) {
    http_response_code(400);
	exit("Falta id del producto"); # Terminar el script definitivamente
}

if (empty($_POST["id_proveedor"])) {
    http_response_code(400);
	exit("Falta id del proveedor"); # Terminar el script definitivamente
}

if (empty($_POST["cantidad_solicitada"])) {
    http_response_code(400);
	exit("Falta la cantidad"); # Terminar el script definitivamente
}

if (empty($_POST["estado"])) {
    http_response_code(400);
	exit("Falta el estado"); # Terminar el script definitivamente
}

if (empty($_POST["fecha_surtido"])) {
    http_response_code(400);
	exit("Falta la fecha de surtido"); # Terminar el script definitivamente
}

if (empty($_POST["costo_pedido"])) {
    http_response_code(400);
	exit("Falta el costo"); # Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pedido = [
    "id_pedido" => $_POST["id_pedido"],
    "fecha_pedido" => $_POST["fecha_pedido"],
    "id_producto" => $_POST["id_producto"],
    "id_proveedor" => $_POST["id_proveedor"],
    "cantidad_solicitada" => $_POST["cantidad_solicitada"],
    "estado" => $_POST["estado"],
    "fecha_surtido" => $_POST["fecha_surtido"],
    "costo_pedido" => $_POST["costo_pedido"]
];

try {
    # Preparando la consulta
    $sentencia = $conex->prepare("UPDATE pedido SET fecha_pedido=:fecha_pedido, id_producto=:id_producto, id_proveedor=:id_proveedor, cantidad_solicitada=:cantidad_solicitada, estado=:estado, fecha_surtido=:fecha_surtido, costo_pedido=:costo_pedido WHERE id_pedido=:id_pedido;");
    $resultado = $sentencia->execute($pedido);
    http_response_code(200);
    echo "Datos actualizados";
} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>