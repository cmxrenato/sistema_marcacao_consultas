<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redefinir Senha</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link href="css/login.css?v=<?= filemtime('css/login.css') ?>" rel="stylesheet" type="text/css">
  <link href="css/redefinirsenha.css?v=<?= filemtime('css/redefinirsenha.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>

  <header class="text-center p-4">
    <h1>Marcação de Consultas</h1>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Logomarca</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="loginprofissional.php">Login para profissionais</a></li>
          <li class="nav-item"><a class="nav-link" href="logincliente.php">Login para Clientes</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-5">
    <div class="row">
      <div class="col-md-4">
        <div class="bg-light p-4 rounded shadow">
          <h3 class="text-center mb-4">Redefinir senha</h3>
          <form action="tratamento_login_profissional.php" method="POST" id="form-login">
            <div class="mb-3">
              <label for="login" class="form-label">Email cadastrado</label>
              <input type="text" name="login" id="login" class="form-control" required>
            </div>            
            <button type="submit" class="btn btn-success w-100">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-secondary text-white text-center p-3">
    <p>&copy; 2025 - Meu Site Responsivo - Renato Leal</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

