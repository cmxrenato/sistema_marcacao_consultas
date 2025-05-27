<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
if (!isset($_SESSION['medico_id']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css?v=<?= filemtime('css/style.css') ?>" rel="stylesheet" type="text/css">
  <link href="css/sistema.css?v=<?= filemtime('css/sistema.css') ?>" rel="stylesheet" type="text/css">
  <script src="js/diasDisponiveis.js?v=1.0.7" defer></script>
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
          <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login para profissionais</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="submenu"><div id="nome"><p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']);
    ?>!</p></div>
<div><a href="logout.php" class="btn btn-danger" onclick="return confirmarSaida()">🔒 Sair</a></div>


</div>

  <!-- Conteúdo principal -->
  <main class="container my-5">
  <h2 class="mb-4">Escolha os dias e horários disponíveis</h2>

  <!-- Dias da semana -->
  <div id="dias-semana">
    <!-- Dias serão inseridos aqui via JS -->
     
  </div>
   <div id="botao-div"><button class="btn btn-success" id="btn-confirmar">Confirmar Seleção</button></div>
  

  <div>
    <h2 id="agenda-label">Agenda disponível</h2>
    <?php include 'listardisponibilidade.php'; ?>
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
