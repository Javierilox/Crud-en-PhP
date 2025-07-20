<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body style="margin:0; padding:0;">

<!-- Video de fondo -->
<video autoplay loop muted playsinline id="bg-video" style="position:fixed; right:0; bottom:0; min-width:100vw; min-height:100vh; width:auto; height:auto; z-index:-1; object-fit:cover;">
  <source src="IMG/HonkaiStarRail.mp4" type="video/mp4">
</video>
<!-- Encabezado de la página -->
<h1 class="text-center" style="color: #fafbfcff;">CRUD PHP</h1>
<style>
  #bg-video {
    position: fixed;
    left: 50%;
    top: -6%; /* Mueve el video más arriba */
    min-width: 100vw;
    min-height: 100vh;
    width: auto;
    height: auto;
    z-index: -1;
    object-fit: cover;
    transform: translate( -50%, -30%); /* Ajusta el centro hacia arriba */
  }
</style>
<div class="container-fluid row">
  <div class="row">
    <!-- Formulario de registro -->
<div class="col-md-4">
  <form action="controlador/registrar.php" method="POST" class="border p-3 rounded bg-light" style="background-color: rgba(255,255,255,0.7) !important;">
    <h3 class="mb-3 text-center" style="color: #ff5722;">Registro de Usuario</h3>

    <!-- Campo Nombre -->
    <div class="mb-2">
      <label for="Nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="Nombre" name="Nombre" required>
    </div>

    <!-- Campo Apellido -->
    <div class="mb-2">
      <label for="Apellido" class="form-label">Apellido</label>
      <input type="text" class="form-control" id="Apellido" name="Apellido" required>
    </div>

    <!-- Campo Email -->
    <div class="mb-2">
      <label for="Email" class="form-label">Email</label>
      <input type="email" class="form-control" id="Email" name="Email" required>
    </div>

    <!-- Campo RUT -->
    <div class="mb-2">
      <label for="RUT" class="form-label">RUT</label>
      <input type="text" class="form-control" id="RUT" name="RUT" required>
    </div>

    <!-- Campo Contraseña -->
    <div class="mb-2">
      <label for="Contraseña" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="Contraseña" name="Contraseña" required>
    </div>

    <!-- Campo Perfil -->
    <div class="mb-2">
      <label for="perfil" class="form-label">Perfil</label>
      <select class="form-select" id="perfil" name="perfil" required>
        <option value="" disabled selected>Seleccione un perfil</option>
        <option value="1">Admin</option>
        <option value="2">Usuario</option>
      </select>
    </div>

    <!-- Botón de envío -->
    <button type="submit" class="btn btn-primary w-100" name="btn_registrar" value="1">Registrar</button>
  </form>
</div>


    <!-- Tabla de usuarios centrada -->
    <div class="col-md-8 d-flex justify-content-center align-items-start">
      <div class="table-responsive w-75 mt-4" style="background-color: rgba(255,255,255,0.7); border-radius: 8px; padding: 10px;">
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th style="color: #ff5722;">ID</th>
              <th style="color: #ff5722;">Nombre</th>
              <th style="color: #ff5722;">Apellido</th>
              <th style="color: #ff5722;">RUT</th>
              <th style="color: #ff5722;">Email</th>
              <th style="color: #ff5722;">Perfil</th>
              <th style="color: #ff5722;">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Fila de ejemplo con botones -->
            <tr>
              <?php include 'modelo/conexion.php'; 
              $sql = $conn->query("SELECT * FROM usuario");
              while($datos = $sql->fetch_object()){?>
                <td><?php echo $datos->ID_Usuario; ?></td>
                <td><?php echo $datos->Nombre; ?></td>
                <td><?php echo $datos->Apellido; ?></td>
                <td><?php echo $datos->RUT; ?></td>
                <td><?php echo $datos->Correo; ?></td>
                <td><?php echo $datos->ID_Perfil == 1 ? 'Admin' : 'Usuario'; ?></td>
                <td>
                  <a href="editar_usuario.php?id=<?php echo $datos->ID_Usuario; ?>" class="btn btn-warning btn-sm" name="btn_editar">Editar</a>
                  <a href="eliminar_usuario.php?id=<?php echo $datos->ID_Usuario; ?>" class="btn btn-danger btn-sm" name="btn_eliminar">Eliminar</a>
                </td>
            </tr>
              <?php } ?>
            <!-- Aquí se mostrarán más usuarios registrados -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

        <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>