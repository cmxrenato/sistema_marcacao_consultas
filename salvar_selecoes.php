<?php
// salvar_disponibilidade
header('Content-Type: application/json');

// Conexão com o banco
include 'conexao.php';

if ($conexao->connect_error) {
  http_response_code(500);
  echo json_encode(["erro" => "Erro de conexão com o banco"]);
  exit;
}

// Receber os dados
$dados = json_decode(file_get_contents("php://input"), true);

if (!is_array($dados)) {
  http_response_code(400);
  echo json_encode(["erro" => "Dados inválidos"]);
  exit;
}

$stmt = $conexao->prepare("INSERT INTO selecoes_consultas (dia, horario) VALUES (?, ?)");

foreach ($dados as $item) {
  $stmt->bind_param("ss", $item['dia'], $item['horario']);
  $stmt->execute();
}

$stmt->close();
$conexao->close();

//Envia para o Front-End uma resposta para ser exibida
echo json_encode(["status" => "ok"]);
?>
