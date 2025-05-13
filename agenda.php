<?php
include 'conexao.php';

// Gera os horários de 09:00 às 20:00 com intervalo de 1h
function gerarHorariosDisponiveis($data, $pdo) {
  $horarios = [];

  // Segunda a sexta (1 a 5)
  if (date('N', strtotime($data)) < 6) {
    for ($h = 9; $h <= 19; $h++) {
      $horaFormatada = sprintf("%02d:00:00", $h);

      // Verifica se já está marcada
      $stmt = $pdo->prepare("SELECT COUNT(*) FROM consultas WHERE data = ? AND hora = ?");
      $stmt->execute([$data, $horaFormatada]);
      $jaMarcado = $stmt->fetchColumn();

      if (!$jaMarcado) {
        $horarios[] = $horaFormatada;
      }
    }
  }

  return $horarios;
}

// Pega os próximos 5 dias úteis
function proximosDiasUteis($quantidade = 5) {
  $dias = [];
  $data = new DateTime();

  while (count($dias) < $quantidade) {
    if ($data->format('N') < 6) {
      $dias[] = $data->format('d-m-Y');
    }
    $data->modify('+1 day');
  }

  return $dias;
}

$diasUteis = proximosDiasUteis();
?>
