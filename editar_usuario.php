<?php
include_once 'modelo/conexion.php'; // conexión con $conn

if (!isset($_GET['id'])) {
    echo "ID de usuario no especificado.";
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM usuario WHERE ID_Usuario = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Usuario no encontrado.";
    exit;
}

$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Video de fondo -->
    <video autoplay loop muted playsinline id="bg-video" style="position:fixed; right:0; bottom:0; min-width:100vw; min-height:100vh; width:auto; height:auto; z-index:-1; object-fit:cover;">
    <source src="IMG/HonkaiStarRail.mp4" type="video/mp4">
    </video>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Editar Usuario</h4>
            </div>
            <div class="card-body">
                <form action="controlador/editar.php" method="POST">
                  <div class="mb-3">
                        <label for="id" class="form-label">ID:</label>
                        <input name="id" class="form-control" value="<?php echo htmlspecialchars($usuario['ID_Usuario']); ?>" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['Nombre']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo htmlspecialchars($usuario['Apellido']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="perfil" class="form-label">Perfil:</label>
                        <input type="text" name="perfil" id="perfil" class="form-control" value="<?php echo htmlspecialchars($usuario['ID_Perfil']); ?>" required>
                    </div>
                    <style>
                        .card.shadow {
                            background: rgba(255,255,255,0.7) !important; /* 30% transparente */
                        }
                    </style>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($usuario['Correo']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="rut" class="form-label">RUT:</label>
                        <input type="text" name="rut" id="rut" class="form-control" value="<?php echo htmlspecialchars($usuario['RUT']); ?>" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="btn_editar" class="btn btn-success">Actualizar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
