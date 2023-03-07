<?php
include_once "../../connect/config.php";

$saida = '';

if(isset($_POST['registo'])){
    $id = $_POST['registo'];
    $cmd = $pdo->prepare("SELECT * FROM funcionarios  LIMIT $id");
    $cmd->execute();
    $material = $cmd->fetchAll();
    foreach($material as $k ){
        $saida .='
            <tr >
                <td>'.$k['id'].'</td>
                <td>'.$k['nome'].'</td>
                <td>'.$k['apelido'].'</td>
                <td>'.$k['email'].'</td>
                <td>'.$k['Area'].'</td>
                <td>'.$k['status'].'</td>
                <td title="Detalhes do Funcionario"><a href="datelhes.php?id='.$k['id'].'"><i class="fa-solid fa-info"></i></a></td>
                <td title="Editar dados do funcionario"><a href="EditarMaterial.php?id='.$k['id'].'"><i class="fa-solid fa-edit"></i></a></td>
            </tr>
        
        ';
    }

}else{
    $cmd = $pdo->prepare("SELECT * FROM funcionarios  LIMIT 5");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $k ){
        $saida .='
            <tr>
                <td>'.$k['id'].'</td>
                <td>'.$k['nome'].'</td>
                <td>'.$k['apelido'].'</td>
                <td>'.$k['email'].'</td>
                <td>'.$k['Area'].'</td>
                <td>'.$k['status'].'</td>
                <td title="Detalhes do Produto"><a href="datelhes.php?id='.$k['id'].'" class="btn btn-info btn-sm"><i class="fa-solid fa-info"></i></a></td>
                <td title="Editar o Produto"><a href="addFuncionario.php?id='.$k['id'].'" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i></a></td>
            </tr>
        
        ';
    }
}

echo $saida;
?>