<?php
include 'conexao.php';



$sql = "SELECT nome, telefone, data_consulta, horario FROM pacientes_consultas ORDER BY data_consulta, horario";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="container my-5">';
  echo '<h3>Consultas Marcadas</h3>';
  echo '<table class="table table-striped">';
  echo '<thead><tr><th>Nome</th><th>Telefone</th><th>Data</th><th>Horário</th></tr></thead>';
  echo '<tbody>';

  while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['nome']) . '</td>';
    echo '<td>' . htmlspecialchars($row['telefone']) . '</td>';
    echo '<td>' . date('d/m/Y', strtotime($row['data_consulta'])) . '</td>';
    echo '<td>' . substr($row['horario'], 0, 5) . '</td>';
    echo '</tr>';
  }

  echo '</tbody></table>';
  echo '</div>';
} else {
  echo '<div class="container my-5"><p>Nenhuma consulta marcada ainda.</p></div>';
}

$conexao->close();
?>
