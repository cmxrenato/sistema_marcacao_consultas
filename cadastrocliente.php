<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Clientes</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link href="css/login.css?v=<?= filemtime('css/login.css') ?>" rel="stylesheet" type="text/css">
  <link href="css/redefinirsenha.css?v=<?= filemtime('css/redefinirsenha.css') ?>" rel="stylesheet" type="text/css">
  <script src="js/cadastro.js?v=1.0.5" defer></script>
</head>
<body>

  <header class="text-center p-4">
    <h1>Marcação de Consultas</h1>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="#">Logomarca</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login para profissionais</a></li>
          <li class="nav-item"><a class="nav-link" href="logincliente.php">Login para Clientes</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-5">
    <div class="row">
      <div class="col-md-4">
        <div class="bg-light p-4 rounded shadow">
          <h3 class="text-center mb-4">Cadastro</h3>
          <form action="tratamentocadastrocliente.php" method="POST" id="form-login">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
              <p id="username-helper" class="helper-text">Mensagem de ajuda</p>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" id="email" class="form-control" required>
              <p id="email-helper" class="helper-text">Mensagem de ajuda</p>
            </div> 
            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <div class="toggle1">
              <input type="password" name="senha" id="senha" class="form-control" required placeholder="Crie uma senha">
              <p id="senha-helper" class="helper-text">Mensagem de ajuda</p>
              <span class="toggle-password-btn" onclick="togglePassword(this, 'senha')">👁️‍🗨️</span>
              </div>
            </div>
            <div class="mb-3">
              <label for="confirma-senha" class="form-label">Confirme a senha</label>
              <div class="toggle1">
              <input type="password" name="confirmesenha" id="confirma-senha" class="form-control" required placeholder="Confirme a senha">
              <span class="toggle-password-btn" onclick="togglePassword(this, 'confirma-senha')">👁️‍🗨️</span>
                       
              </div>
              <p id="confirma-senha-helper" class="helper-text">Mensagem de ajuda</p>
            </div>             
            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
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

