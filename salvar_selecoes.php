<?php
// Conexão com o banco
include 'conexao.php';

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Lê os dados recebidos (espera um JSON)
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['selecoes']) && is_array($data['selecoes'])) {
  foreach ($data['selecoes'] as $selecao) {
    $dia = $conn->real_escape_string($selecao['dia']);
    $horario = $conn->real_escape_string($selecao['horario']);

    $conn->query("INSERT INTO selecoes_consultas (dia, horario) VALUES ('$dia', '$horario')");
  }
  echo json_encode(["status" => "ok"]);
} else {
  echo json_encode(["status" => "erro", "mensagem" => "Dados inválidos."]);
}

$conn->close();
?>
