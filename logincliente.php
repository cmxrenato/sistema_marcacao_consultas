<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Cliente</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
   <link href="css/login.css?v=<?= filemtime('css/login.css') ?>" rel="stylesheet" type="text/css">
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
          <li class="nav-item"><a class="nav-link" href="loginprofissional.php">Login para profissionais</a></li>
          <li class="nav-item"><a class="nav-link" href="logincliente.php">Login para Clientes</a></li>
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
        <div class="bg-light p-4 rounded shadow">
         
   
    
      <h3 class="text-center mb-4">Login do Cliente</h3>
      <form action="tratamentologincliente.php" method="POST" id="form-login">
        <div class="mb-3">
          <label for="login" class="form-label">Usuário</label>
          <input type="text" name="email" id="login" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control" required>
        </div>
       
        <button type="submit" class="btn btn-success w-100">Entrar</button>
        <div class="link-cadastro">

            <div class="mb-3">
            <a href="redefinirsenha.php" class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" >Redefina sua senha
                <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">
                     <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
            </a>
            </div>
            <div class="mb-3">
            <a href="cadastrocliente.php" class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" >É novo por aqui? Então cadastre-se!
                <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
            </a>
            </div>
        </div>
      </form>
    </div>
  </div>
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
