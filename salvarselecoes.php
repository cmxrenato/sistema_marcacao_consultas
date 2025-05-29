<?php
// salvar_disponibilidade.php
session_start(); // necessário para acessar $_SESSION

header('Content-Type: application/json');
include 'conexao.php';

// Verifica se o médico está logado
if (!isset($_SESSION['medico_id'])) {
  http_response_code(403);
  echo json_encode(["erro" => "Médico não logado"]);
  exit;
}

$medico_id = $_SESSION['medico_id'];

// Verifica conexão
if ($conexao->connect_error) {
  http_response_code(500);
  echo json_encode(["erro" => "Erro de conexão com o banco"]);
  exit;
}

// Receber os dados
$dados= json_decode(file_get_contents("php://input"), true);

if (!is_array($dados)) {
  http_response_code(400);
  echo json_encode(["erro" => "Dados inválidos"]);
  exit;
}

$stmt = $conexao->prepare("INSERT INTO selecoes_consultas (dia, horario, medico_id) VALUES (?, ?, ?)");

foreach ($dados as $item) {
  $stmt->bind_param("ssi", $item['data'], $item['horario'], $medico_id);
  $stmt->execute();
}


$stmt->close();
$conexao->close();
header('Content-Type: application/json');
echo json_encode(["status" => "ok"]);
exit;
?>
