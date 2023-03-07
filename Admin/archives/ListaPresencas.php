<?php
include_once "../../connect/config.php";
$saida = '';

if(!empty($_POST['data1']) and empty($_POST['data2'])){
    // $saida .= 'um';
    $data = $_POST['data1'];
    $cmd = $pdo->prepare("SELECT f.nome,p.id,p.data,p.Entrada,p.Saida, p.registo FROM presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where data = '$data'");
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
            <td colspan="6">Sem Dados '.$data.'</td>
        </tr>

        
        ';
    }
}elseif(!empty($_POST['data1']) and !empty($_POST['data2'])){
    $data = $_POST['data1'];
    $data1 = $_POST['data2'];
    $cmd = $pdo->prepare("SELECT f.nome,p.id,p.data,p.Entrada,p.Saida, p.registo FROM presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where data between '$data' and '$data1'");
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
                <td colspan="6">Sem Dados Entre '.$data.' e '.$data1.'</td>
            </tr>
        
        ';
    }
}else{
    $data = date('Y-m-d');
    $cmd = $pdo->prepare("SELECT f.nome,p.id,p.data,p.Entrada,p.Saida, p.registo FROM presenca p INNER JOIN funcionarios f ON f.id = p.id_funcionario where data = '$data'");
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
}



echo $saida;
?>