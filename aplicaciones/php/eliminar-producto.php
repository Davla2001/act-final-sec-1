<?php
include 'vars.php';

# Verificar si viene el parámetro requerido
if (empty($_POST["id"])) {
    http_response_code(400);
    exit("Falta ID"); # Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    # Preparando la consulta para eliminar el producto
    $sentencia = $conex->prepare("DELETE FROM producto WHERE id_producto = :id");
    $resultado = $sentencia->execute(['id' => $_POST["id"]]);
    
    if ($resultado) {
        http_response_code(200);
        echo "El producto ha sido eliminado correctamente.";
    } else {
        http_response_code(400);
        echo "No se pudo eliminar el producto.";
    }
} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>
