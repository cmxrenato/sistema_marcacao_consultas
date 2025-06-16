<?php
include 'conexao.php';

if (!empty($_POST['nome']) && !empty($_POST['data']) && !empty($_POST['hora'])) {
  // Evita duplicação
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM consultas WHERE data = ? AND hora = ?");
  $stmt->execute([$_POST['data'], $_POST['hora']]);
  if ($stmt->fetchColumn() > 0) {
    echo "Horário já foi reservado!";
    exit;
  }

  // Insere
  $stmt = $pdo->prepare("INSERT INTO consultas (nome, data, hora) VALUES (?, ?, ?)");
  $stmt->execute([$_POST['nome'], $_POST['data'], $_POST['hora']]);

  echo "Consulta agendada com sucesso!";
  // Redireciona ou exibe mensagem
}
?>
