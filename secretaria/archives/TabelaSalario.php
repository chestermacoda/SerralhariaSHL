<?php
include_once "../../connect/config.php";

$saida = '';

if(isset($_POST['registo'])){
    $id = $_POST['registo'];
    $cmd = $pdo->prepare("SELECT * FROM funcionarios where status = 'on' LIMIT $id ");
    $cmd->execute();
    $material = $cmd->fetchAll();
    foreach($material as $k ){
        $saida .='
            <tr>
                <td>'.$k['id'].'</td>
                <td>'.$k['nome'].'</td>
                <td>'.$k['apelido'].'</td>
                <td>'.$k['Area'].'</td>
                <td>'.$k['status'].'</td>
                <td title="Detalhes do Funcionario"><a href="datelhes.php?id='.$k['id'].'" class="btn btn-info btn-sm"><i class="fa-solid fa-info"></i></a></td>
                <td title="Imprimit Folha Salarial Individual"><a target="_blank" href="FolhaSalario.php?id='.$k['id'].'" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i></a></td>
            </tr>
        
        ';
    }

}else{
    $cmd = $pdo->prepare("SELECT * FROM funcionarios where status = 'on' LIMIT 5");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $k ){
        $saida .='
            <tr>
                <td>'.$k['id'].'</td>
                <td>'.$k['nome'].'</td>
                <td>'.$k['apelido'].'</td>
                <td>'.$k['Area'].'</td>
                <td>'.$k['status'].'</td>
                <td title="Detalhes do Funcionario"><a href="datelhes.php?id='.$k['id'].'" class="btn btn-info btn-sm"><i class="fa-solid fa-info"></i></a></td>
                <td title="Imprimit Folha Salarial Individual"><a target="_blank" href="FolhaSalario.php?id='.$k['id'].'" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i></a></td>
            </tr>
        
        ';
    }
}

echo $saida;
?>

