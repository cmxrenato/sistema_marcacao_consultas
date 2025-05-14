<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
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
          <li class="nav-item"><a class="nav-link" href="login.php">Login para profissionais</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <main class="container my-5">
    <div class="row">
      <div class="col-md-8">
        <h2>Bem-vindo!</h2>
        <p>Este é um exemplo de página para marcação de consultas.</p>
      </div>
      <div class="col-md-4">
        <div class="bg-light p-3 rounded shadow">
         
  <h4>Agenda de Consultas</h4>
  <form method="POST" action="marcar.php">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome do Paciente</label>
    <input type="text" name="nome" id="nome" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="data" class="form-label">Data</label>
    <select name="data" id="data" class="form-select" required onchange="this.form.submit()">
      <option value="">Selecione a data</option>
      <?php foreach ($diasUteis as $d): ?>
        <option value="<?= $d ?>" <?= (isset($_POST['data']) && $_POST['data'] == $d) ? 'selected' : '' ?>>
          <?= date('d/m/Y', strtotime($d)) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <?php if (!empty($_POST['data'])): ?>
    <div class="mb-3">
      <label for="hora" class="form-label">Horário</label>
      <select name="hora" id="hora" class="form-select" required>
        <?php
          $horarios = gerarHorariosDisponiveis($_POST['data'], $pdo);
          foreach ($horarios as $h) {
            echo "<option value=\"$h\">" . date('H:i', strtotime($h)) . "</option>";
          }
          if (empty($horarios)) {
            echo "<option disabled>Todos os horários estão ocupados</option>";
          }
        ?>
      </select>
    </div>
  <?php endif; ?>

  <?php if (!empty($_POST['data']) && !empty($horarios)): ?>
    <button type="submit" class="btn btn-success w-100">Confirmar Agendamento</button>
  <?php endif; ?>
</form>
</div>

        </div>
      </div>
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
