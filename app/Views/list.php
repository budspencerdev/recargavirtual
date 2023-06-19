<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Clientes</title>
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #ffffff;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-size: 20px;
      font-weight: bold;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .search-form {
      margin-bottom: 20px;
    }

    .clients-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .pagination {
      justify-content: center;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Facturas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2>Listado de Clientes</h2>

    <form class="search-form" method="GET" action="<?= site_url('/consulta') ?>">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar por DNI" name="dni" aria-label="Buscar por DNI" aria-describedby="buscar-btn">
        <button class="btn btn-primary" type="button" id="buscar-btn">Buscar</button>
      </div>
    </form>

    <!-- Listado de Usuarios -->
    <table class="table clients-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Dni</th>
            <th>Correo</th>
            <th>Saldo</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nombres']; ?></td>
                <td><?php echo $usuario['dni']; ?></td>
                <td><?php echo $usuario['correo']; ?></td>
                <td><?php echo $usuario['saldo']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $usuario['id'] ?>">
                        Nuevo Saldo
                    </button>
                </td>
            </tr>
            <!-- Modal para el usuario -->
            <div class="modal fade" id="modal<?= $usuario['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $usuario['id'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel<?= $usuario['id'] ?>"><?= $usuario['nombres'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= site_url('/recarga') ?>" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id_usuario" value="<?= $usuario['id'] ?>">
                                <input type="hidden" name="dni_usuario" value="<?= $usuario['dni'] ?>">
                                <div class="mb-3">
                                    <label for="saldo_recarga" class="form-label">Recarga</label>
                                    <input type="number" class="form-control" id="saldo_recarga" name="saldo_recarga" required>
                                    <label for="saldo_actual" class="form-label">Saldo Actual</label>
                                    <input type="number" class="form-control" id="saldo_actual" name="saldo_actual" value="<?= $usuario['saldo'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
        </li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">Siguiente</a>
        </li>
      </ul>
    </nav>
  </div>

  <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>