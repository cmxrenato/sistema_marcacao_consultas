<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marcação de Consultas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css?v=<?= filemtime('css/style.css') ?>" rel="stylesheet" type="text/css">
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
    <div class="row" >
      <div class="col-md-8">
        <h2>Bem-vindo!</h2>
        <p>Este é um exemplo de página para marcação de consultas.</p>
      </div>
 <div class="col-md-4" >
<div class="bg-light p-3 rounded shadow" id="formulario" >
         
  <h4>Agenda de Consultas</h4>
  
    <form action="processar_agendamento.php" method="POST" class="needs-validation" novalidate>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="nome" class="form-label">Nome do Paciente</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
          <div class="invalid-feedback">Informe o nome do paciente.</div>
        </div>
        <div class="col-md-6">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="tel" class="form-control" id="telefone" name="telefone" required>
          <div class="invalid-feedback">Informe um telefone válido.</div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="data" class="form-label">Data da Consulta</label>
          <input type="date" class="form-control" id="data" name="data" required>
          <div class="invalid-feedback">Escolha uma data.</div>
        </div>
        <div class="col-md-6">
          <label for="horario" class="form-label">Horário</label>
          <input type="time" class="form-control" id="horario" name="horario" required>
          <div class="invalid-feedback">Escolha um horário.</div>
        </div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Agendar Consulta</button>
      </div>
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
