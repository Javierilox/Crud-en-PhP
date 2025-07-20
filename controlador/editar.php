<?php
include_once '../modelo/conexion.php'; // conexión con $conn

if (isset($_POST['btn_editar'])) {
    // Nombres de campos corregidos para que coincidan con el formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $rut = $_POST['rut'];
    $id_perfil = $_POST['perfil'];

    $sql = "UPDATE usuario SET Nombre = ?, Apellido = ?, Correo = ?, RUT = ?, ID_Perfil = ? WHERE ID_Usuario = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Corregido: 6 variables = 6 tipos
    $stmt->bind_param("ssssii", $nombre, $apellido, $email, $rut, $id_perfil, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?mensaje=Usuario actualizado correctamente");
        exit();
    } else {
        header("Location: ../index.php?mensaje=Error al actualizar usuario");
        exit();
    }
}
?>
