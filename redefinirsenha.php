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
    <script src="js/cadastro.js?v=1.0.0" defer></script>

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
                    <li class="nav-item"><a class="nav-link" href="loginprofissional.php">Login para Profissionais</a></li>
                    <li class="nav-item"><a class="nav-link" href="logincliente.php">Login para Clientes</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow">
                    <h3 class="text-center mb-4">Verificar usuário</h3>
                    <form action="verificarUsuario.php" method="POST" id="cadastro-form">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                            <p id="username-helper" class="helper-text">Mensagem de ajuda</p>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">
                                Telefone
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                </svg>
                            </label>
                            <input
                                type="tel"
                                name="telefone"
                                id="telefone"
                                class="form-control"
                                required

                                placeholder="Digite somente números">
                            <p id="telefone-helper" class="helper-text">
                                Informe um telefone válido no formato 81999999999.
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <p id="email-helper" class="helper-text">Mensagem de ajuda</p>
                        </div>



                        <button type="submit" class="btn btn-success w-100">Verificar</button>

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
