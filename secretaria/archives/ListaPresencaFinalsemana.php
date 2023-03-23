<?php
include_once "../../connect/config.php";
session_start();
$saida = '';

if (isset($_SESSION['dataFinalsemana'])) {
    
    $data = $_SESSION['dataFinalsemana'];
    $timeOut = date("H:i:s");


    $cmd = $pdo->query("SELECT f.id,f.nome,p.data,p.Entrada,p.Saida,p.id as id_presenca  FROM `presenca` p INNER JOIN funcionarios f ON p.id_funcionario = f.id  where  data = '$data' ");

    $dado = $cmd->fetchAll();

    if ($cmd->rowCount() > 0) {
        $style = '';
        $buttonSaida = '';



        foreach ($dado as $d) {
            $disable = '';
            if ($d['Entrada'] > 0) {
                $style = 'bg-info text-white';
                $btnSaida = '<button class="btn btn-outline-primary  saida" id="' . $d['id'] . '" data-value="' . $timeOut . '"><i class="fa-solid fa-check"></i></button>';
                $disable = 'disabled';
            } else {
                $style = '';
                $btnSaida = '';
            }

            if ($d['Saida'] > 0) {
                $style = 'bg-success text-white';
                $btnSaida = '<button ' . $disable . ' class="btn btn-outline-primary  saida" id="' . $d['id'] . '" data-value="' . $timeOut . '"><i class="fa-solid fa-check"></i></button>';
                $disable = 'disabled';
            }

            $saida .= '
            <tr class="' . $style . '">
                    <td><input type="checkbox" name="select[]" id="" value="' . $d['id'] . '">
                      </td>
                    <td>' . $d['nome'] . '</td> 
                    <td>' . $d['data'] . '</td>
                    <td><button ' . $disable . ' class="btn btn-outline-primary  entrada" id="' . $d['id'] . '" data-value="' . $timeOut . '"><i class="fa-solid fa-check"></i></button></td>
                    <td>' . $btnSaida . '</td>
                    <td><a href="EditarPresenca.php?id=' . $d['id_presenca'] .'" class="btn btn-outline-primary"><i class="fa-solid fa-edit"></i></a></td>
                </tr>
            
            ';
        }
    } 

}else {
    $saida .= '
        <tr class="bg-dark text-white">
             <td colspan="6">Adiciona a Lista de Presença A cima</td>
        </tr>
        
        ';
}

echo $saida;


 