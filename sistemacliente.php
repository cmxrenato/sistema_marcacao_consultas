<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marcação de Consultas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css?v=<?= filemtime('css/style.css') ?>" rel="stylesheet" type="text/css">
  <script src="js/confirmarSaida.js?v=1.0.7" defer></script>
</head>
<body>

  <!-- Cabeçalho -->
  <header class="text-center p-4">
    <h1>Marcação de Consultas</h1>
    
  </header>

  <!-- Navegação -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="#">Logomarca</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
          <li class="nav-item"><a class="nav-link" href="loginprofissional.php">Login para profissionais</a></li>
          <li class="nav-item"><a class="nav-link" href="logincliente.php">Login para Clientes</a></li>
          <li class="nav-item"><a href="logout.php" class="btn btn-danger" onclick="return confirmarSaida()">🔒 Sair</a></li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <main class="container my-5">
    <div class="row" >
      <div class="col-md-8">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?> !</h2>
        <p>Este é um exemplo de página para marcação de consultas.</p>
      </div>
      <div class="col-md-4">
         <form action="agenda.php" method="POST" id="agenda-form">
          <div class="mb-3">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
              <p id="username-helper" class="helper-text">Mensagem de ajuda</p>
            </div>
            <div class="mb-3">
              <label for="nome" class="form-label">Email</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
              <p id="username-helper" class="helper-text">Mensagem de ajuda</p>
            </div>
            <div class="mb-3">
              <label for="nome" class="form-label">Telefone/WhatsApp</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
              <p id="username-helper" class="helper-text">Mensagem de ajuda</p>
            </div>
               <div class="mb-3">
              <label for="nome" class="form-label"></label>
              <select class="form-select" aria-label="Default select example">
                   <option selected>Selecione o dia e horário da consulta</option>
                   <option value="1">One</option>
                   <option value="2">Two</option>
                   <option value="3">Three</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Agendar</button>
         </form>

      </div>

  </main>

  <!-- Rodapé -->
  <footer class="bg-secondary text-white text-center p-3">
    <p>&copy; 2025 - Meu Site Responsivo- Renato Leal</p>
  </footer>

  <!-- Bootstrap JS (inclui Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
