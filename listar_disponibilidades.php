<?php



include 'conexao.php';
session_start(); // se ainda não iniciou a sessão

$medico_id = $_SESSION['medico_id'] ?? null;

if (!$medico_id) {
    die("ID do médico não encontrado na sessão.");
}

$sql = "SELECT dia, horario FROM selecoes_consultas WHERE medico_id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $medico_id);
$stmt->execute();
$result = $stmt->get_result(); // <-- usa o resultado da execução preparada

if ($result->num_rows > 0) {
    echo "<table class='table table-striped table'>
            <tr>
                <th>Dia</th>
                <th>Horário</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["dia"]) . "</td>
                <td>" . htmlspecialchars($row["horario"]) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$stmt->close();
$conexao->close();
?>
