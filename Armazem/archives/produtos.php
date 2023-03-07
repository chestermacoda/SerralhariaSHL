<?php
include_once "../../connect/config.php";

$saida = '';

if(isset($_POST['registo'])){
    $id = $_POST['registo'];
    $cmd = $pdo->prepare("SELECT * FROM material  LIMIT $id");
        // $cmd->bindValue(":id",);
    $cmd->execute();
    $material = $cmd->fetchAll();
    // $material = $con->materialLimit($id);
    foreach($material as $k ){
        $saida .='
            <tr >
                <td>'.$k['id'].'</td>
                <td>'.$k['NomeMaterial'].'</td>
                <td>'.$k['tipo'].'</td> 
                <td>'.$k['medida'].'</td>
                <td>'.$k['quantidade'].'</td>
                <td title="Detalhes do Produto"><a href="datelhes.php?id='.$k['id'].'"><i class="fa-solid fa-info"></i></a></td>
                <td title="Editar o Produto"><a href="EditarMaterial.php?id='.$k['id'].'"><i class="fa-solid fa-edit"></i></a></td>
            </tr>
        
        ';
    }

}else{
    // $dados = $con->material();
    $cmd = $pdo->prepare("SELECT * FROM material  LIMIT 5");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    foreach($dados as $k ){
        $saida .='
            <tr>
                <td>'.$k['id'].'</td>
                <td>'.$k['NomeMaterial'].'</td>
                <td>'.$k['tipo'].'</td>
                <td>'.$k['medida'].'</td>
                <td>'.$k['quantidade'].'</td>
                <td title="Detalhes do Produto"><a href="datelhes.php?id='.$k['id'].'" class="btn btn-info btn-sm"><i class="fa-solid fa-info"></i></a></td>
                <td title="Editar o Produto"><a href="EditarMaterial.php?id='.$k['id'].'" class="btn btn-primary btn-sm"><i class="fa-solid fa-edit"></i></a></td>
            </tr>
        
        ';
    }
}

echo $saida;
?>