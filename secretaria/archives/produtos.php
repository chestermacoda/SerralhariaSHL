<?php
include_once "../../connect/config.php";

$saida = ''; 

if(isset($_POST['registo'])){
    $id = $_POST['registo'];
    $cmd = $pdo->prepare("SELECT * FROM material where quantidade <= 6  LIMIT $id");
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
            </tr>
        
        ';
    }

}else{
    // $dados = $con->material();
    $cmd = $pdo->prepare("SELECT * FROM material where quantidade <= 6  LIMIT 5");
    $cmd->execute();
    $dados = $cmd->fetchAll();
    if($cmd->rowCount() > 0){
        foreach($dados as $k ){
            $saida .='
                <tr>
                    <td>'.$k['id'].'</td>
                    <td>'.$k['NomeMaterial'].'</td>
                    <td>'.$k['tipo'].'</td>
                    <td>'.$k['medida'].'</td>
                    <td>'.$k['quantidade'].'</td>
                </tr>
            
            ';
        }
    }else{

            $saida .='
                <tr>
                    <td colspan="6">Sem Dados</td>
                </tr>
            
            ';
        
    }
}

echo $saida;
?>