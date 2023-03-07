<?php
include_once "../../connect/config.php";

$saida = '';
$cmd = $pdo->query("SELECT * FROM ferramenta");

$tools = $cmd->fetchAll();


if(isset($_POST['registo'])){
    $id = $_POST['registo'];
    $cmd = $pdo->query("SELECT * FROM ferramenta  LIMIT $id");

    $tools = $cmd->fetchAll();
            foreach($tools as $t){
                    $saida .= '
                    <tr>
                        <td>'.$t['id'].'</td>
                        <td>'.$t['nome'].'</td>
                        <td>'.$t['quantidade'].'</td>
                        <td>'.$t['cor'].'</td>
                        <td title="Editar o Produto"><a href="addFerramentas.php?id='.$t['id'].'" class="btn btn-primary btn-sm "><i class="fa-solid fa-edit"></i></a></td>
                    </tr>
                ';
            }

}else{
   
    $cmd = $pdo->query("SELECT * FROM ferramenta order by quantidade asc ");

    $tools = $cmd->fetchAll();
        if($cmd->rowCount() > 0){
            foreach($tools as $t){
                    $saida .= '
                    <tr>
                        <td>'.$t['id'].'</td>
                        <td>'.$t['nome'].'</td>
                        <td>'.$t['quantidade'].'</td>
                        <td>'.$t['cor'].'</td>
                        <td title="Editar o Produto"><a href="addFerramentas.php?id='.$t['id'].'" class="btn btn-primary btn-sm "><i class="fa-solid fa-edit"></i></a></td>
                    </tr>
                ';
            }
        }else{
            $saida .= '
                    <tr>
                        <td colspan>Sem Dados</td>
                    </tr>
                ';
        }
}

echo $saida;

?>