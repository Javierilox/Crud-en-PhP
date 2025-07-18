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
<body>
<!-- Encabezado de la página -->
<h1 class="text-center text-secondary">CRUD en PHP</h1>
<div class="container-fluid row">
  <div class="row">
    <!-- Formulario de registro -->
    <div class="col-md-4">
      <form action="agregar_usuario.php" method="POST" class="border p-3 rounded bg-light">
        <h3 class="mb-3 text-center text-secondary">Registro de Usuario</h3>
        <div class="mb-2">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-2">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="mb-2">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="Email">
        </div>
        <div class="mb-2">
          <label for="perfil" class="form-label">Perfil</label>
          <select class="form-select" id="perfil" name="perfil" required>
            <option value="" disabled selected>Seleccione un perfil</option>
            <option value="1">Admin</option>
            <option value="2">Usuario</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrar</button>
      </form>
    </div>

    <!-- Tabla de usuarios centrada -->
    <div class="col-md-8 d-flex justify-content-center align-items-start">
      <div class="table-responsive w-75 mt-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Email</th>
              <th>Perfil</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Fila de ejemplo con botones -->
            <tr>
              <td>1</td>
              <td>Juan</td>
              <td>Pérez</td>
              <td>juan@example.com</td>
              <td>Admin</td>
              <td>
                <button class="btn btn-sm btn-warning me-1" title="Editar">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" title="Eliminar">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
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