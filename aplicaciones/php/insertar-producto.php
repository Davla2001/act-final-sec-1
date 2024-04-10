<?php
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["nombre"]) || empty($_POST["marca"]) || empty($_POST["categoria"]) || empty($_POST["stock"]) || empty($_POST["precio_compra"]) || empty($_POST["precio_venta"])) {
    http_response_code(400);
    exit("Faltan campos requeridos");
}

# Verificar que los campos numéricos no sean negativos
if ($_POST["stock"] < 0 || $_POST["precio_compra"] < 0 || $_POST["precio_venta"] < 0) {
    http_response_code(400);
    exit("Los campos numéricos no pueden ser negativos");
}

try {
    # Conexión a la base de datos
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Datos del nuevo registro
    $producto = [
        "nombre" => $_POST["nombre"],
        "marca" => $_POST["marca"],
        "categoria" => $_POST["categoria"],
        "stock" => $_POST["stock"],
        "precio_compra" => $_POST["precio_compra"],
        "precio_venta" => $_POST["precio_venta"]
    ];

    # Preparar la consulta de inserción
    $sentencia = $conex->prepare("INSERT INTO producto (nom_producto, marca, categoria, stock, precio_compra, precio_venta) VALUES (:nombre, :marca, :categoria, :stock, :precio_compra, :precio_venta)");
    
    # Ejecutar la consulta con los datos del nuevo producto
    $resultado = $sentencia->execute($producto);

    http_response_code(200);
    echo "Datos insertados correctamente";

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>