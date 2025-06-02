<?php



include 'conexao.php';


$login = $_SESSION['telefone']; 




$sql = "SELECT id, data_consulta, horario, nome, telefone, criado_em FROM consultas_marcadas WHERE telefone = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result(); // <-- usa o resultado da execução preparada

if ($result->num_rows > 0) {
    echo "<table class='table table-striped table'>
            <tr>
                <th>Dia da Consulta</th>
                <th>Horário</th>
                <th>Nome</th>
                 <th>Telefone</th>
                 <th>Consulta marcada em </th>

            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["data_consulta"]) . "</td>
                <td>" . htmlspecialchars($row["horario"]) . "</td>
                <td> ".htmlspecialchars($row["nome"]) . " </td>
                <td> ".htmlspecialchars($row["telefone"]) . " </td>
                <td> ".htmlspecialchars($row["criado_em"]) . " </td>

              </tr>";
    }

    echo "</table>";
} else {
    echo "<div class='senao'>Não há consultas marcadas!</div>";
}

$stmt->close();
$conexao->close();
?>
