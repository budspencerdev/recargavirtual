<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

<!-- Formulario de login -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Iniciar sesión
        </div>
        <div class="card-body">
          <form action="<?= site_url('auth/login') ?>" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Usuario</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

