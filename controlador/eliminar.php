<?php
require_once '../modelo/conexion.php';
/**
 * Obtiene la lista de usuarios activos desde la base de datos.
 * 
 * 1. Prepara la consulta SQL para seleccionar usuarios activos.
 * 2. Ejecuta la consulta utilizando el objeto de conexión $db.
 * 3. Recupera todos los resultados como un arreglo asociativo.
 * 4. Retorna el arreglo de usuarios activos.
 */
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM usuario WHERE ID_Usuario = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            // Redirige junto a un mensaje
            header("Location: ../index.php?mensaje=Usuario eliminado correctamente");
            exit();
        } else {
            echo "Error al eliminar el usuario: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "ID de usuario no especificado.";
}

$conn->close();
?>
