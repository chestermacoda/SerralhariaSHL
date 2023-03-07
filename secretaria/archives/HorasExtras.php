<?php
include_once "../../connect/config.php";

$saida = '';
if (isset($_POST['registo'])) {
    $data = $_POST['registo'];;
    $timeOut = date("H:i:s");

    $cmd = $pdo->query("SELECT p.id,f.nome,p.data,p.Entrada,p.Saida  FROM `presenca` p INNER JOIN funcionarios f ON p.id_funcionario = f.id  where  data = '$data' and Entrada != '' and Saida !='' and HorasExtras = '' ");

    $dado = $cmd->fetchAll(PDO::FETCH_ASSOC);
    if ($cmd->rowCount() > 0) {
        $style = '';
        $buttonSaida = '';
        foreach ($dado as $d) {
            $saida .= '
            <tr class="' . $style . '">
                <td><input type="checkbox" name="select[]" id="" value="' . $d['id'] . '"></td>
                <td>' . $d['nome'] . '</td>
                <td>' . $d['data'] . '</td>
                <td>' . $d['Entrada'] . '</td>
                <td>' . $d['Saida'] . '</td>
            </tr>
            ';
        }
    } else {
        $saida .= '
                <tr class="">
                    <td colspan="6">Nenhum Funcionario Esteve Apto para Horas Extras Nessa data</td>
                </tr> 
            ';
    }
} else {
    $saida .= '
                <tr class="">
                     <td colspan="6">Escolha a Data Primeiro</td>
                </tr>
                
            ';
     
}

echo $saida;


 

 
