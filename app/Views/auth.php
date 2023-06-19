<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/login.css') ?>">

<body>
  <div class="container">
    <div class="login-container">
      <div class="logo">
        <img src="logo.png" alt="Logo">
      </div>
      <h2 class="login-heading">Inicio de sesión</h2>
      <form action="<?= site_url('auth/login') ?>" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="username" class="form-control" id="username" name="username" placeholder="Ingrese su username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su password" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>