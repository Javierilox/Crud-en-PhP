<?php
if (!empty($_POST["btn_registrar"])) {
    if (
        !empty($_POST["Nombre"]) &&
        !empty($_POST["Apellido"]) &&
        !empty($_POST["Contraseña"]) &&
        !empty($_POST["RUT"]) &&
        !empty($_POST["perfil"]) &&
        !empty($_POST["Email"])
    ) {
        include '../modelo/conexion.php';

        $nombre = trim($_POST["Nombre"]);
        $apellido = trim($_POST["Apellido"]);
        $email = trim($_POST["Email"]);
        $rut = trim($_POST["RUT"]);
        $contraseña = password_hash($_POST["Contraseña"], PASSWORD_DEFAULT);
        $perfil = intval($_POST["perfil"]);

        // Verificar si ya existe el RUT o Email
        $stmt_check = $conn->prepare("SELECT ID_Usuario FROM usuario WHERE RUT = ? OR Correo = ?");
        $stmt_check->bind_param("ss", $rut, $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            echo "<script>alert('Ya existe un usuario con ese RUT o correo.'); window.location.href='../index.php';</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO usuario ( `Nombre`, `Apellido`, `RUT`, `Correo`, `Contraseña`, `ID_Perfil`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $nombre, $apellido, $rut, $email, $contraseña, $perfil);

            if ($stmt->execute()) {
                echo "<script>alert('Usuario registrado exitosamente'); window.location.href='../index.php';</script>";
            } else {
                echo "<script>alert('Error al registrar usuario: " . $stmt->error . "'); window.location.href='../index.php';</script>";
            }

            $stmt->close();
        }

        $stmt_check->close();
        $conn->close();
    } else {
        echo "<script>alert('Por favor complete todos los campos obligatorios'); window.location.href='../index.php';</script>";
    }
} else {
    echo "<script>alert('Error en la solicitud'); window.location.href='../index.php';</script>";
}
?>
