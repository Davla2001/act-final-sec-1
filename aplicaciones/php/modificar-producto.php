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

if (empty($_POST["marca"])) {
    http_response_code(400);
	exit("Falta marca"); # Terminar el script definitivamente
}

if (empty($_POST["categoria"])) {
    http_response_code(400);
	exit("Falta categoría"); # Terminar el script definitivamente
}

if (empty($_POST["stock"])) {
    http_response_code(400);
	exit("Falta stock"); # Terminar el script definitivamente
}

if (empty($_POST["precio_compra"])) {
    http_response_code(400);
	exit("Falta precio de compra"); # Terminar el script definitivamente
}

if (empty($_POST["precio_venta"])) {
    http_response_code(400);
	exit("Falta precio de venta"); # Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$producto = [
    "id" => $_POST["id"],
    "nombre" => $_POST["nombre"],
    "marca" => $_POST["marca"],
    "categoria" => $_POST["categoria"],
    "stock" => $_POST["stock"],
    "precio_compra" => $_POST["precio_compra"],
    "precio_venta" => $_POST["precio_venta"]
];

try {
    # Preparando la consulta
    $sentencia = $conex->prepare("UPDATE producto SET nom_producto=:nombre, marca=:marca, categoria=:categoria, stock=:stock, precio_compra=:precio_compra, precio_venta=:precio_venta WHERE id_producto=:id;");
    $resultado = $sentencia->execute($producto);
    http_response_code(200);
    echo "Datos actualizados";
} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>