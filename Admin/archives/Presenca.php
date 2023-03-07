<?php
include_once "../../connect/config.php";

$saida = '';


    $data = date('Y-m-d');
    $cmd = $pdo->prepare("SELECT * FROM presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where data = '$data'");
    $cmd->execute();
    $All = $cmd->fetchAll();
    if($cmd->rowCount() > 0){
        foreach($All as $k){
            $saida .='
            <tr >
                <td>'.$k['id'].'</td>
                <td>'.$k['nome'].'</td>
                <td>'.$k['Entrada'].'</td>
                <td>'.$k['Saida'].'</td> 
                <td>'.$k['data'].'</td>
            </tr>
        
        ';
        }
    }else{
        $saida .='
        <tr >
            <td colspan="6">Sem Dados </td>
        </tr>
        
        ';
    }


echo $saida;
?>