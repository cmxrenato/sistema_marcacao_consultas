<?php

include 'conexao.php';

$sql = "SELECT dia, horario FROM selecoes_consultas"; // Exemplo de tabela
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped table'>
            <tr>
                <th>Dia</th>
                <th>Horário</th>
                
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["dia"] . "</td>
                <td>" . $row["horario"] . "</td>
               
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conexao->close();

?>