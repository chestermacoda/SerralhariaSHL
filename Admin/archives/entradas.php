<?php
include_once "../../connect/config.php";

$saida = '';

if(isset($_POST['registo'])){
    $id = $_POST['registo'];
    $cmd = $pdo->prepare("SELECT en.id,m.NomeMaterial,m.tipo,m.medida,en.quantidade,en.data FROM `entrada` en INNER join material m ON en.id_material = m.id  LIMIT $id");
        // $cmd->bindValue(":id",);
    $cmd->execute();
    $material = $cmd->fetchAll();
    // $material = $con->materialLimit($id);
    if($cmd->rowCount() > 0){
        foreach($material as $k ){
            $saida .='
                <tr >
                    <td>'.$k['id'].'</td>
                    <td>'.$k['NomeMaterial'].'</td>
                    <td>'.$k['tipo'].'</td> 
                    <td>'.$k['medida'].'</td>
                    <td>'.$k['quantidade'].'</td>
                    <td title="Detalhes do Produto"><a href="datelhes.php?id='.$k['id'].'"><i class="fa-solid fa-info"></i></a></td>
                    
                </tr>
            
            ';
        }

    }else{
        $saida .='
                <tr>
                    <td colspan="7">Sem Dados</td>
                </tr>
            
            ';
    }


}elseif(isset($_POST['data'])){
    $id = $_POST['data'];
    $cmd = $pdo->prepare("SELECT en.id,m.NomeMaterial,m.tipo,m.medida,en.quantidade,en.data FROM `entrada` en INNER join material m ON en.id_material = m.id  where en.data = '$id'");
        // $cmd->bindValue(":id",);
    $cmd->execute();
    $material = $cmd->fetchAll();
    // $material = $con->materialLimit($id);
    if($cmd->rowCount() > 0){
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
        $saida .='
                <tr>
                    <td colspan="7">Sem Dados Diarios</td>
                </tr>
            
            ';
    }

}else{
    // $dados = $con->material();
    $date = date('Y-m-d') ;
    $cmd = $pdo->prepare("SELECT en.id,m.NomeMaterial,m.tipo,m.medida,en.quantidade,en.data FROM `entrada` en INNER join material m ON en.id_material = m.id where en.data = '$date' LIMIT 5");
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
                    <td colspan="7">Sem Dados Diarios</td>
                </tr>
            
            ';
    }
}

echo $saida;
?>